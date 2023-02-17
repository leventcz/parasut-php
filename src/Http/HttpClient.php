<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Http;

use GuzzleHttp\Client;
use Leventcz\Parasut\Exceptions\BadRequestException;
use Leventcz\Parasut\Exceptions\HttpException;
use Leventcz\Parasut\Exceptions\NotFoundException;
use Leventcz\Parasut\Exceptions\ParasutException;
use Leventcz\Parasut\Exceptions\UnauthorizedException;
use Leventcz\Parasut\Exceptions\ValidationException;
use Leventcz\Parasut\ValueObjects\Method;
use Psr\Http\Message\ResponseInterface;
use Throwable;

readonly final class HttpClient implements HttpClientInterface
{
    /**
     * @param  Client  $client
     * @param  array  $options
     */
    public function __construct(private Client $client, private array $options = [])
    {
    }

    /**
     * @param  Method  $method
     * @param  string  $uri
     * @param  array  $header
     * @param  array  $query
     * @param  array  $body
     * @return ResponseInterface
     * @throws ParasutException
     */
    public function request(
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
                        'http_errors' => false,
                        'headers' => [
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json',
                            ...$header,
                        ],
                        'query' => $query,
                        'json' => $body
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
     * @throws ParasutException
     */
    private function handleRequestError(ResponseInterface $response): void
    {
        $body = (string) $response->getBody();

        throw match ($response->getStatusCode()) {
            400 => new BadRequestException($body),
            401 => new UnauthorizedException($body),
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
        return ! in_array($response->getStatusCode(), [200, 201, 204]);
    }
}
