<?php

declare(strict_types=1);

namespace Leventcz\Parasut;

use GuzzleHttp\Client as Guzzle;
use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\Http\GuzzleHttpClient;
use Leventcz\Parasut\ValueObjects\Credential;

final class Parasut
{
    /**
     * @param  array{client_id: string, client_secret: string, company_id: string, username: string, password: string}  $credentials
     * @param  array<mixed>  $options
     * @return Client
     * @throws ClientException
     */
    public static function client(array $credentials, array $options = []): Client
    {
        $guzzle = new Guzzle();
        $credential = Credential::fromArray($credentials);
        $httpClient = new GuzzleHttpClient($guzzle, $credential, $options);

        return new Client($httpClient);
    }
}
