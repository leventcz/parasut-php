<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Http;

use Leventcz\Parasut\Exceptions\ParasutException;
use Leventcz\Parasut\ValueObjects\Method;
use Psr\Http\Message\ResponseInterface;

interface HttpClientInterface
{
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
    ): ResponseInterface;
}
