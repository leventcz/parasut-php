<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources\Concerns;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

trait DeletesResource
{
    use InteractsWithAPI;

    /**
     * @param  int  $id
     * @param  array<string, string|array<string, string>>  $query
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function delete(int $id, array $query = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::DELETE,
                uri: "{$this->getResource()}/$id",
                query: $query,
            );
    }
}
