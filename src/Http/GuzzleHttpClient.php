<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Http;

use GuzzleHttp\Client;
use JsonException;
use Leventcz\Parasut\Exceptions\BadRequestException;
use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\Exceptions\ForbiddenException;
use Leventcz\Parasut\Exceptions\HttpException;
use Leventcz\Parasut\Exceptions\NotFoundException;
use Leventcz\Parasut\Exceptions\UnauthorizedException;
use Leventcz\Parasut\Exceptions\UnserializableResponse;
use Leventcz\Parasut\Exceptions\ValidationException;
use Leventcz\Parasut\ValueObjects\Credential;
use Leventcz\Parasut\ValueObjects\Method;
use Leventcz\Parasut\ValueObjects\Token;
use Psr\Http\Message\ResponseInterface;
use Throwable;

final class GuzzleHttpClient implements HttpClientInterface
{
    /**
     * @var Token
     */
    private Token $token;

    /**
     * @param  Client  $client
     * @param  Credential  $credential
     * @param  array<mixed>  $options
     */
    public function __construct(
        private readonly Client $client,
        private readonly Credential $credential,
        private readonly array $options = []
    ) {
    }

    /**
     * @param  Method  $method
     * @param  string  $uri
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function authenticatedRequest(Method $method, string $uri, array $query = [], array $body = []): ?array
    {
        $response = $this
            ->request(
                method: $method,
                uri: $this->buildCompanyUri($uri),
                header: $this->authorizationHeader(),
                query: $query,
                body: $body,
            );

        return $this->parseResponse($response);
    }

    /**
     * @return Token
     * @throws ClientException
     */
    private function getNewToken(): Token
    {
        $response = $this
            ->request(
                method: Method::POST,
                uri: 'oauth/token',
                body: [
                    'client_id' => $this->credential->clientId,
                    'client_secret' => $this->credential->clientSecret,
                    'username' => $this->credential->userName,
                    'password' => $this->credential->password,
                    'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
                    'grant_type' => 'password',
                ]
            );

        /** @var array{access_token: string, refresh_token: string, expires_in: int, created_at: int} $attributes */
        $attributes = $this->parseResponse($response);

        return Token::fromArray($attributes);
    }

    /**
     * @return Token
     * @throws ClientException
     */
    private function refreshExistingToken(): Token
    {
        $response = $this
            ->request(
                method: Method::POST,
                uri: 'oauth/token',
                body: [
                    'client_id' => $this->credential->clientId,
                    'client_secret' => $this->credential->clientSecret,
                    'refresh_token' => $this->token->refreshToken,
                    'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
                    'grant_type' => 'refresh_token',
                ]
            );

        /** @var array{access_token: string, refresh_token: string, expires_in: int, created_at: int} $attributes */
        $attributes = $this->parseResponse($response);

        return Token::fromArray($attributes);
    }

    /**
     * @param  Method  $method
     * @param  string  $uri
     * @param  array<string, string>  $header
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return ResponseInterface
     * @throws ClientException
     */
    private function request(
        Method $method,
        string $uri,
        array $header = [],
        array $query = [],
        array $body = []
    ): ResponseInterface {
        try {
            $response = $this
                ->client
                ->request(
                    $method->name,
                    $uri,
                    [
                        'base_uri' => self::BASE_URI,
                        'http_errors' => false,
                        'headers' => [
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json',
                            ...$header,
                        ],
                        'query' => $query,
                        'json' => $body,
                    ] + $this->options,
                );
        } catch (Throwable $exception) {
            throw new HttpException($exception->getMessage());
        }

        if ($this->requestIsFailed($response)) {
            $this->handleRequestError($response);
        }

        return $response;
    }

    /**
     * @param  ResponseInterface  $response
     * @return void
     * @throws ClientException
     */
    private function handleRequestError(ResponseInterface $response): void
    {
        $body = (string) $response->getBody();

        throw match ($response->getStatusCode()) {
            400 => new BadRequestException($body),
            401 => new UnauthorizedException($body),
            403 => new ForbiddenException($body),
            404 => new NotFoundException($body),
            422 => new ValidationException($body),
            default => new HttpException($body),
        };
    }

    /**
     * @param  ResponseInterface  $response
     * @return bool
     */
    private function requestIsFailed(ResponseInterface $response): bool
    {
        return ! in_array($response->getStatusCode(), [200, 201, 202, 204]);
    }

    /**
     * @param  string  $uri
     * @return string
     */
    private function buildCompanyUri(string $uri): string
    {
        return sprintf('%s/%s/%s', self::VERSION, $this->credential->companyId, $uri);
    }

    /**
     * @return Token
     * @throws ClientException
     */
    private function getToken(): Token
    {
        if (! isset($this->token)) {
            return $this->token = $this->getNewToken();
        }

        if ($this->tokenIsExpired()) {
            return $this->token = $this->refreshExistingToken();
        }

        return $this->token;
    }

    /**
     * @return array<string, string>
     * @throws ClientException
     */
    private function authorizationHeader(): array
    {
        return ['Authorization' => "Bearer {$this->getToken()->accessToken}"];
    }

    /**
     * @return bool
     */
    private function tokenIsExpired(): bool
    {
        return ($this->token->createdAt + $this->token->expiresIn) <= gmdate('U');
    }

    /**
     * @param  ResponseInterface  $response
     * @return array<mixed>
     * @throws UnserializableResponse
     */
    private function parseResponse(ResponseInterface $response): array
    {
        if ($response->getStatusCode() === 204) {
            return [];
        }

        try {
            return (array) json_decode((string) $response->getBody(), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new UnserializableResponse($e);
        }
    }
}
