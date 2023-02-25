<?php

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Credential;

it('creates from array', function () {
    $credential = Credential::fromArray(credential());

    expect($credential)
        ->toBeInstanceOf(Credential::class)
        ->and($credential->clientId)->toBeString()
        ->and($credential->clientSecret)->toBeString()
        ->and($credential->companyId)->toBeString()
        ->and($credential->userName)->toBeString()
        ->and($credential->password)->toBeString();
});

it('catches invalid credentials', function () {
    expect(fn () => Credential::fromArray(invalidCredential()))
        ->toThrow(ClientException::class);
});
