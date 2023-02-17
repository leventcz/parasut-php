<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Http\HttpClientInterface;

abstract class Resource
{
    /**
     * @param  HttpClientInterface  $httpClient
     */
    public function __construct(protected readonly HttpClientInterface $httpClient)
    {
    }
}
