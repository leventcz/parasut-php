<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

class TrackableJob extends ApiResource
{
    /**
     * @var string
     */
    protected string $resource = 'trackable_jobs';

    /**
     * @param  string  $id
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function show(string $id): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::GET,
                uri: "{$this->getResource()}/$id"
            );
    }
}
