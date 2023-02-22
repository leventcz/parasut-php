<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\Resources\Concerns\CreatesResource;
use Leventcz\Parasut\Resources\Concerns\DeletesResource;
use Leventcz\Parasut\Resources\Concerns\EditsResource;
use Leventcz\Parasut\Resources\Concerns\IndexesResources;
use Leventcz\Parasut\Resources\Concerns\ShowsResource;
use Leventcz\Parasut\ValueObjects\Method;

class Contact extends ApiResource
{
    use IndexesResources;
    use CreatesResource;
    use ShowsResource;
    use EditsResource;
    use DeletesResource;

    /**
     * @var string
     */
    protected string $resource = 'contacts';

    /**
     * @param  int  $id
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function contactDebitTransactions(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::POST,
                uri: "{$this->getResource()}/$id/contact_debit_transactions",
                query: $query,
                body: $body,
            );
    }

    /**
     * @param  int  $id
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function contactCreditTransactions(int $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::POST,
                uri: "{$this->getResource()}/$id/contact_credit_transactions",
                query: $query,
                body: $body,
            );
    }
}
