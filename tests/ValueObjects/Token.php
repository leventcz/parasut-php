<?php

use Leventcz\Parasut\ValueObjects\Token;

it('creates from array', function () {
    $token = Token::fromArray(freshToken());

    expect($token)
        ->toBeInstanceOf(Token::class)
        ->and($token->accessToken)->toBeString()
        ->and($token->refreshToken)->toBeString()
        ->and($token->expiresIn)->toBeInt()
        ->and($token->createdAt)->toBeInt();
});
