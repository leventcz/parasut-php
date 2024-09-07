<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Resources\Concerns\CreatesResource;
use Leventcz\Parasut\Resources\Concerns\DeletesResource;
use Leventcz\Parasut\Resources\Concerns\EditsResource;
use Leventcz\Parasut\Resources\Concerns\IndexesResources;

class Webhook extends ApiResource
{
    use IndexesResources;
    use CreatesResource;
    use EditsResource;
    use DeletesResource;

    /**
     * @var string
     */
    protected string $resource = 'webhooks';
}
