<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Endpoints;

use Leventcz\Parasut\Exceptions\ParasutException;
use Leventcz\Parasut\ValueObjects\Method;

class PurchaseBill extends Endpoint
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
                uri: 'purchase_bills',
                query: $query,
            );
    }

    /**
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ParasutException
     */
    public function createBasic(array $query = [], array $body = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function createDetailed(array $query = [], array $body = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function show(int $id, array $query = []): ?array
    {
        return $this
            ->authenticatedRequest(
                method: Method::GET,
                uri: "purchase_bills/$id",
                query: $query,
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
                uri: "purchase_bills/$id",
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @param  array  $body
     * @return array|null
     * @throws ParasutException
     */
    public function editBasic(int $id, array $query = [], array $body = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function editDetailed(int $id, array $query = [], array $body = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function pay(int $id, array $query = [], array $body = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function cancel(int $id, array $query = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function recover(int $id, array $query = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function archive(int $id, array $query = []): ?array
    {
        return $this
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
     * @throws ParasutException
     */
    public function unArchive(int $id, array $query = []): ?array
    {
        return $this
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "purchase_bills/$id/unarchive",
                query: $query,
            );
    }
}
