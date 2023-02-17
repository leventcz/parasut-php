<?php

use Leventcz\Parasut\Client;
use Leventcz\Parasut\ClientFactory;

$sampleCredential = [
    'client_id' => '',
    'client_secret' => '',
    'company_id' => '',
    'username' => '',
    'password' => '',
];

it('creates simple client', function () use ($sampleCredential) {
    $client = ClientFactory::create($sampleCredential);

    expect($client)->toBeInstanceOf(Client::class);
});

it('creates client with options', function () use ($sampleCredential) {
    $client = ClientFactory::create($sampleCredential, ['debug' => true]);

    expect($client)->toBeInstanceOf(Client::class);
});
