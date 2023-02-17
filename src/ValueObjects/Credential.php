<?php

declare(strict_types=1);

namespace Leventcz\Parasut\ValueObjects;

readonly class Credential
{
    /**
     * @param  string  $clientId
     * @param  string  $clientSecret
     * @param  string  $companyId
     * @param  string  $userName
     * @param  string  $password
     */
    public function __construct(
        public string $clientId,
        public string $clientSecret,
        public string $companyId,
        public string $userName,
        public string $password
    ) {
    }

    /**
     * @param  array  $attributes
     * @return Credential
     */
    public static function fromArray(array $attributes): Credential
    {
        return new self(
            clientId: $attributes['client_id'],
            clientSecret: $attributes['client_secret'],
            companyId: $attributes['company_id'],
            userName: $attributes['username'],
            password: $attributes['password']
        );
    }
}
