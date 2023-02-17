<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

final class SalesInvoice extends Resource
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
                uri: 'sales_invoices',
                query: $query
            );
    }

    /**
     * @param  array  $body
     * @return array|null
     * @throws ClientException
     */
    public function create(array $body = []): ?array
    {
        return $this
            ->httpClient
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
     * @throws ClientException
     */
    public function show(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
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
     * @throws ClientException
     */
    public function edit(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
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
     * @throws ClientException
     */
    public function delete(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
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
     * @throws ClientException
     */
    public function pay(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
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
     * @throws ClientException
     */
    public function cancel(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
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
     * @throws ClientException
     */
    public function recover(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
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
     * @throws ClientException
     */
    public function archive(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
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
     * @throws ClientException
     */
    public function unArchive(int $id, array $query = []): ?array
    {
        return $this
            ->httpClient
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
     * @throws ClientException
     */
    public function convertToInvoice(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->httpClient
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "sales_invoices/$id/convert_to_invoice",
                query: $query,
                body: $body,
            );
    }
}
