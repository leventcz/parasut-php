<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\Resources\Concerns\CreatesResource;
use Leventcz\Parasut\Resources\Concerns\ShowsResource;
use Leventcz\Parasut\ValueObjects\Method;

class ESmm extends ApiResource
{
    use CreatesResource;
    use ShowsResource;

    /**
     * @var string
     */
    protected string $resource = 'e_smms';

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
                method: Method::GET,
                uri: "{$this->getResource()}/$id.pdf",
            );
    }
}
