<?php

declare(strict_types=1);

namespace Leventcz\Parasut\ValueObjects;

use Leventcz\Parasut\Exceptions\ClientException;

readonly class Credential
{
    /**
     * @var array<string>
     */
    private const REQUIRED_PROPERTIES = [
        'client_id',
        'client_secret',
        'company_id',
        'username',
        'password',
    ];

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
     * @param  array{client_id: string, client_secret: string, company_id: string, username: string, password: string}  $attributes
     * @return Credential
     * @throws ClientException
     */
    public static function fromArray(array $attributes): Credential
    {
        foreach (self::REQUIRED_PROPERTIES as $property) {
            if (! isset($attributes[$property])) {
                throw new ClientException("$property is required.");
            }
        }

        return new self(
            clientId: $attributes['client_id'],
            clientSecret: $attributes['client_secret'],
            companyId: $attributes['company_id'],
            userName: $attributes['username'],
            password: $attributes['password']
        );
    }
}
