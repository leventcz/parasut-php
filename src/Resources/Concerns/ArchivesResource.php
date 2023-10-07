<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources\Concerns;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

trait ArchivesResource
{
    use InteractsWithAPI;

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function archive(string $id, array $query = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "{$this->getResource()}/$id/archive",
                query: $query,
            );
    }
}
