<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources\Concerns;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

trait IndexesResources
{
    use InteractsWithAPI;

    /**
     * @param  array  $query
     * @return array|null
     * @throws ClientException
     */
    public function index(array $query = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::GET,
                uri: $this->getResource(),
                query: $query,
            );
    }
}
