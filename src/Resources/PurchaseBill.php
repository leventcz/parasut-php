<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\Resources\Concerns\ArchivesResource;
use Leventcz\Parasut\Resources\Concerns\DeletesResource;
use Leventcz\Parasut\Resources\Concerns\IndexesResources;
use Leventcz\Parasut\Resources\Concerns\ShowsResource;
use Leventcz\Parasut\Resources\Concerns\UnArchivesResource;
use Leventcz\Parasut\ValueObjects\Method;

class PurchaseBill extends ApiResource
{
    use IndexesResources;
    use ShowsResource;
    use DeletesResource;
    use ArchivesResource;
    use UnArchivesResource;

    /**
     * @var string
     */
    protected string $resource = 'purchase_bills';

    /**
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function createBasic(array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::POST,
                uri: "{$this->getResource()}#basic",
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function createDetailed(array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::POST,
                uri: "{$this->getResource()}#detailed",
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function editBasic(string $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::PUT,
                uri: "{$this->getResource()}/$id#basic",
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function editDetailed(string $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::PUT,
                uri: "{$this->getResource()}/$id#detailed",
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function pay(string $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::POST,
                uri: "{$this->getResource()}/$id/payments",
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function cancel(string $id, array $query = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::DELETE,
                uri: "{$this->getResource()}/$id/payments",
                query: $query,
            );
    }

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function recover(string $id, array $query = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "{$this->getResource()}/$id/recover",
                query: $query,
            );
    }
}
