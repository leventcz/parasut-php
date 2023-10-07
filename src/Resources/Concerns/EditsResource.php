<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources\Concerns;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

trait EditsResource
{
    use InteractsWithAPI;

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function edit(string $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::PUT,
                uri: "{$this->getResource()}/$id",
                query: $query,
                body: $body,
            );
    }
}
