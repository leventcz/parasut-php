<?php

use Leventcz\Parasut\Client;
use Leventcz\Parasut\Parasut;

it('creates simple client', function () {
    $client = Parasut::client(credential());

    expect($client)->toBeInstanceOf(Client::class);
});

it('creates client with options', function () {
    $client = Parasut::client(credential(), ['debug' => true]);

    expect($client)->toBeInstanceOf(Client::class);
});
