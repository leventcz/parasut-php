<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

class BankFee extends ApiResource
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
                uri: 'bank_fees',
                query: $query,
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
                uri: "bank_fees/$id",
                query: $query,
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ClientException
     */
    public function edit(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::PUT,
                uri: "bank_fees/$id",
                query: $query,
                body: $body,
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
                uri: "bank_fees/$id",
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
                uri: "bank_fees/$id/archive",
                query: $query
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
                uri: "bank_fees/$id/unarchive",
                query: $query
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
                method: Method::PATCH,
                uri: "bank_fees/$id/payments",
                query: $query,
                body: $body
            );
    }
}
