<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Resources\Concerns\ShowsResource;

class TrackableJob extends ApiResource
{
    use ShowsResource;

    /**
     * @var string
     */
    protected string $resource = 'trackable_jobs';
}
