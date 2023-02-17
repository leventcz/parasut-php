<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Endpoints;

use Leventcz\Parasut\Exceptions\ParasutException;
use Leventcz\Parasut\ValueObjects\Method;

class Contact extends Endpoint
{
    /**
     * @param  array  $query
     * @return array|null
     * @throws ParasutException
     */
    public function index(array $query = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function create(array $query = [], array $body = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function show(int $id, array $query = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function edit(int $id, array $query = [], array $body = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function delete(int $id): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function contactDebitTransactions(int $id, array $query = [], array $body = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function contactCreditTransactions(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->authenticatedRequest(
                method: Method::POST,
                uri: "contacts/$id/contact_credit_transactions",
                query: $query,
                body: $body,
            );
    }
}
