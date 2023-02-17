<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Endpoints;

use Leventcz\Parasut\Exceptions\ParasutException;
use Leventcz\Parasut\ValueObjects\Method;

class BankFee extends Endpoint
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
                uri: 'bank_fees',
                query: $query,
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
                uri: "bank_fees/$id",
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
                method: Method::PUT,
                uri: "bank_fees/$id",
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
                uri: "bank_fees/$id",
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ParasutException
     */
    public function archive(int $id, array $query = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function unArchive(int $id, array $query = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function pay(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "bank_fees/$id/payments",
                query: $query,
                body: $body
            );
    }
}
