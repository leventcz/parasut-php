<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Endpoints;

use Leventcz\Parasut\Exceptions\ParasutException;
use Leventcz\Parasut\ValueObjects\Method;

class SalesInvoice extends Endpoint
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
                uri: 'sales_invoices',
                query: $query
            );
    }

    /**
     * @param  array  $body
     * @return array|null
     * @throws ParasutException
     */
    public function create(array $body = []): ?array
    {
        return $this
            ->authenticatedRequest(
                method: Method::POST,
                uri: 'sales_invoices',
                body: $body
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
                method: METHOD::GET,
                uri: "sales_invoices/$id",
                query: $query
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ParasutException
     */
    public function edit(int $id, array $query = []): ?array
    {
        return $this
            ->authenticatedRequest(
                method: Method::PUT,
                uri: "sales_invoices/$id",
                query: $query,
                body: $query
            );
    }

    /**
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ParasutException
     */
    public function delete(int $id, array $query = []): ?array
    {
        return $this
            ->authenticatedRequest(
                method: Method::DELETE,
                uri: "sales_invoices/$id",
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
                method: Method::POST,
                uri: "sales_invoices/$id/payments",
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
                uri: "sales_invoices/$id/cancel",
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
                uri: "sales_invoices/$id/recover",
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
                uri: "sales_invoices/$id/archive",
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
                uri: "sales_invoices/$id/unarchive",
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
    public function convertToInvoice(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "sales_invoices/$id/convert_to_invoice",
                query: $query,
                body: $body,
            );
    }
}
