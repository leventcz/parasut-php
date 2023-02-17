<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

final class PurchaseBill extends Resource
{
    /**
     * @param  array  $query
     * @return array|null
     * @throws ClientException
     */
    public function index(array $query = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::GET,
                uri: 'purchase_bills',
                query: $query,
            );
    }

    /**
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ClientException
     */
    public function createBasic(array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::POST,
                uri: 'purchase_bills#basic',
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ClientException
     */
    public function createDetailed(array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::POST,
                uri: 'purchase_bills#detailed',
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ClientException
     */
    public function show(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::GET,
                uri: "purchase_bills/$id",
                query: $query,
            );
    }

    /**
     * @param  int  $id
     * @return array|null
     * @throws ClientException
     */
    public function delete(int $id): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::DELETE,
                uri: "purchase_bills/$id",
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ClientException
     */
    public function editBasic(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::PUT,
                uri: "purchase_bills/$id#basic",
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ClientException
     */
    public function editDetailed(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::PUT,
                uri: "purchase_bills/$id#detailed",
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ClientException
     */
    public function pay(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::POST,
                uri: "purchase_bills/$id/payments",
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ClientException
     */
    public function cancel(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::DELETE,
                uri: "purchase_bills/$id/payments",
                query: $query,
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ClientException
     */
    public function recover(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "purchase_bills/$id/recover",
                query: $query,
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ClientException
     */
    public function archive(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "purchase_bills/$id/archive",
                query: $query,
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ClientException
     */
    public function unArchive(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "purchase_bills/$id/unarchive",
                query: $query,
            );
    }
}
