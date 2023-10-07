<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

class InventoryLevel extends ApiResource
{
    /**
     * @var string
     */
    protected string $resource = 'inventory_levels';

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function index(string $id, array $query = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::GET,
                uri: "products/$id/{$this->getResource()}",
                query: $query,
            );
    }
}
