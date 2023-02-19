<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Http\HttpClientInterface;

abstract class ApiResource
{
    /**
     * @var string
     */
    protected string $resource;

    /**
     * @param  HttpClientInterface  $httpClient
     */
    public function __construct(protected readonly HttpClientInterface $httpClient)
    {
    }

    /**
     * @return HttpClientInterface
     */
    protected function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @return string
     */
    protected function getResource(): string
    {
        return $this->resource;
    }
}
