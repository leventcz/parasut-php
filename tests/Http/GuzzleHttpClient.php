<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Leventcz\Parasut\Http\GuzzleHttpClient;
use Leventcz\Parasut\ValueObjects\Credential;
use Leventcz\Parasut\ValueObjects\Method;

beforeEach(function () {
    $this->guzzle = Mockery::mock(Client::class)
        ->makePartial();

    $credentials = Credential::fromArray(credential());

    $this->httpClient = new GuzzleHttpClient($this->guzzle, $credentials, []);
});

it('authenticates before sending first request', function () {
    $this->guzzle
        ->shouldReceive('request')
        ->once()
        ->withSomeOfArgs(method: 'POST', uri: 'oauth/token')
        ->andReturns(new Response(200, [], json_encode(freshToken())));

    $this->guzzle
        ->shouldReceive('request')
        ->once()
        ->withSomeOfArgs(method: 'GET', uri: 'v4/COMPANY_ID/foo')
        ->andReturns(new Response(200, [], json_encode([])));

    $response = $this->httpClient->authenticatedRequest(Method::GET, 'foo');

    expect($response)->toBe([]);
});

it('uses existing active token in requests', function () {
    $this->guzzle
        ->shouldReceive('request')
        ->once()
        ->withSomeOfArgs(method: 'POST', uri: 'oauth/token')
        ->andReturns(new Response(200, [], json_encode(freshToken())));

    $this->guzzle
        ->shouldReceive('request')
        ->twice()
        ->withSomeOfArgs(method: 'GET', uri: 'v4/COMPANY_ID/foo')
        ->andReturns(new Response(200, [], json_encode([])));

    $firstResponse = $this->httpClient->authenticatedRequest(Method::GET, 'foo');
    $secondResponse = $this->httpClient->authenticatedRequest(Method::GET, 'foo');

    expect($firstResponse)->toBe([])
        ->and($secondResponse)->toBe([]);
});

it('refreshes expired token before sending request', function () {
    $this->guzzle
        ->shouldReceive('request')
        ->twice()
        ->withSomeOfArgs(method: 'POST', uri: 'oauth/token')
        ->andReturns(new Response(200, [], json_encode(expiredToken())));

    $this->guzzle
        ->shouldReceive('request')
        ->twice()
        ->withSomeOfArgs(method: 'GET', uri: 'v4/COMPANY_ID/foo')
        ->andReturns(new Response(200, [], json_encode([])));

    $firstResponse = $this->httpClient->authenticatedRequest(Method::GET, 'foo');
    $secondResponse = $this->httpClient->authenticatedRequest(Method::GET, 'foo');

    expect($firstResponse)->toBe([])
        ->and($secondResponse)->toBe([]);
});
