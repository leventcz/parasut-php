<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\Resources\Concerns\ArchivesResource;
use Leventcz\Parasut\Resources\Concerns\CreatesResource;
use Leventcz\Parasut\Resources\Concerns\DeletesResource;
use Leventcz\Parasut\Resources\Concerns\EditsResource;
use Leventcz\Parasut\Resources\Concerns\IndexesResources;
use Leventcz\Parasut\Resources\Concerns\ShowsResource;
use Leventcz\Parasut\Resources\Concerns\UnArchivesResource;
use Leventcz\Parasut\ValueObjects\Method;

class SalesOffer extends ApiResource
{
    use IndexesResources;
    use CreatesResource;
    use ShowsResource;
    use EditsResource;
    use DeletesResource;
    use ArchivesResource;
    use UnArchivesResource;

    /**
     * @var string
     */
    protected string $resource = 'sales_offers';

    /**
     * @param  string  $id
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function pdf(string $id): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::POST,
                uri: "{$this->getResource()}/$id/pdf"
            );
    }

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function details(string $id, array $query = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::GET,
                uri: "{$this->getResource()}/$id/details",
                query: $query
            );
    }

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function updateStatus(string $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "{$this->getResource()}/$id/update_status",
                query: $query,
                body: $body
            );
    }
}
