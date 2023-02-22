<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources\Concerns;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

trait CreatesResource
{
    use InteractsWithAPI;

    /**
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function create(array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::POST,
                uri: $this->getResource(),
                body: $body,
            );
    }
}
