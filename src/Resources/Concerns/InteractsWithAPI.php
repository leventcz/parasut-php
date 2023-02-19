<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources\Concerns;

use Leventcz\Parasut\Http\HttpClientInterface;

trait InteractsWithAPI
{
    /**
     * @return string
     */
    abstract protected function getResource(): string;

    /**
     * @return HttpClientInterface
     */
    abstract protected function getHttpClient(): HttpClientInterface;
}
