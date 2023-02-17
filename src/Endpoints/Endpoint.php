<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Endpoints;

use Leventcz\Parasut\Exceptions\ParasutException;
use Leventcz\Parasut\Http\HttpClientInterface;
use Leventcz\Parasut\ValueObjects\Credential;
use Leventcz\Parasut\ValueObjects\Method;
use Leventcz\Parasut\ValueObjects\Token;
use Psr\Http\Message\ResponseInterface;

abstract class Endpoint
{
    /**
     * @var string
     */
    const VERSION = 'v4';

    /**
     * @var Token
     */
    private Token $token;

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly Credential $credential
    ) {
    }

    /**
     * @param  Method  $method
     * @param  string  $uri
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ParasutException
     */
    protected function authenticatedRequest(Method $method, string $uri, array $query = [], array $body = []): ?array
    {
        $response = $this
            ->httpClient
            ->request(
                method: $method,
                uri: $this->buildUri($uri),
                header: $this->authorizationHeader(),
                query: $query,
                body: $body,
            );

        return $this->parseResponse($response);
    }

    /**
     * @return Token
     * @throws ParasutException
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
     * @return string[]
     * @throws ParasutException
     */
    private function authorizationHeader(): array
    {
        return ['Authorization' => "Bearer {$this->getToken()->accessToken}"];
    }

    /**
     * @param  string  $uri
     * @return string
     */
    protected function buildUri(string $uri): string
    {
        return sprintf('%s/%s/%s', self::VERSION, $this->credential->companyId, $uri);
    }

    /**
     * @return bool
     */
    private function tokenIsExpired(): bool
    {
        return $this->token->createdAt + $this->token->expiresIn > time();
    }

    /**
     * @return Token
     * @throws ParasutException
     */
    private function getNewToken(): Token
    {
        $response = $this
            ->httpClient
            ->request(
                method: Method::POST,
                uri: 'oauth/token',
                body: [
                    'client_id' => $this->credential->clientId,
                    'client_secret' => $this->credential->clientSecret,
                    'username' => $this->credential->userName,
                    'password' => $this->credential->password,
                    'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
                    'grant_type' => 'password'
                ]
            );

        $attributes = $this->parseResponse($response);

        return Token::fromArray($attributes);
    }

    /**
     * @return Token
     * @throws ParasutException
     */
    private function refreshExistingToken(): Token
    {
        $response = $this
            ->httpClient
            ->request(
                method: Method::POST,
                uri: 'oauth/token',
                body: [
                    'client_id' => $this->credential->clientId,
                    'client_secret' => $this->credential->clientSecret,
                    'refresh_token' => $this->token->refreshToken,
                    'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
                    'grant_type' => 'refresh_token'
                ]
            );

        $attributes = $this->parseResponse($response);

        return Token::fromArray($attributes);
    }


    /**
     * @param  ResponseInterface  $response
     * @return array|null
     */
    private function parseResponse(ResponseInterface $response): ?array
    {
        return json_decode((string) $response->getBody(), true) ?: null;
    }
}
