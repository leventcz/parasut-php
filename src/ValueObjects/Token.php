<?php

declare(strict_types=1);

namespace Leventcz\Parasut\ValueObjects;

readonly class Token
{
    /**
     * @param  string  $accessToken
     * @param  string  $refreshToken
     * @param  int  $expiresIn
     * @param  int  $createdAt
     */
    public function __construct(
        public string $accessToken,
        public string $refreshToken,
        public int $expiresIn,
        public int $createdAt,
    ) {
    }

    /**
     * @param  array  $attributes
     * @return Token
     */
    public static function fromArray(array $attributes): Token
    {
        return new self(
            accessToken: $attributes['access_token'],
            refreshToken: $attributes['refresh_token'],
            expiresIn: $attributes['expires_in'],
            createdAt: $attributes['created_at']
        );
    }
}
