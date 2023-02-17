<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

class Contact extends Resource
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
                uri: 'contacts',
                query: $query,
            );
    }

    /**
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ClientException
     */
    public function create(array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::POST,
                uri: 'contacts',
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
                uri: "contacts/$id",
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
                method: Method::GET,
                uri: "contacts/$id",
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
                uri: "contacts/$id",
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ClientException
     */
    public function contactDebitTransactions(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::POST,
                uri: "contacts/$id/contact_debit_transactions",
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
    public function contactCreditTransactions(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::POST,
                uri: "contacts/$id/contact_credit_transactions",
                query: $query,
                body: $body,
            );
    }
}
