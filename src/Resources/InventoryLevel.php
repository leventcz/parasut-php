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
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ClientException
     */
    public function index(int $id, array $query = []): ?array
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
