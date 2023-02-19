<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Resources\Concerns\DeletesResource;
use Leventcz\Parasut\Resources\Concerns\ShowsResource;

class Transaction extends ApiResource
{
    use ShowsResource;
    use DeletesResource;

    /**
     * @var string
     */
    protected string $resource = 'transactions';
}
