<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Http;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

interface HttpClientInterface
{
    /**
     * @const string
     */
    public const BASE_URI = 'https://api.parasut.com';

    /**
     * @var string
     */
    public const VERSION = 'v4';

    /**
     * @param  Method  $method
     * @param  string  $uri
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function authenticatedRequest(Method $method, string $uri, array $query = [], array $body = []): ?array;
}
