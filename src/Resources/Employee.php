<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Resources\Concerns\ArchivesResource;
use Leventcz\Parasut\Resources\Concerns\CreatesResource;
use Leventcz\Parasut\Resources\Concerns\DeletesResource;
use Leventcz\Parasut\Resources\Concerns\EditsResource;
use Leventcz\Parasut\Resources\Concerns\IndexesResources;
use Leventcz\Parasut\Resources\Concerns\ShowsResource;
use Leventcz\Parasut\Resources\Concerns\UnArchivesResource;

class Employee extends ApiResource
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
    protected string $resource = 'employees';
}
