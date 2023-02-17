<?php

declare(strict_types=1);

namespace Leventcz\Parasut;

use GuzzleHttp\Client as Guzzle;
use Leventcz\Parasut\Http\HttpClient;
use Leventcz\Parasut\ValueObjects\Credential;

final class ClientFactory
{
    /**
     * @const string
     */
    const BASE_URI = 'https://api.parasut.com';

    /**
     * @param  array  $credentials
     * @param  array  $options
     * @return Client
     */
    public static function create(array $credentials, array $options = []): Client
    {
        $guzzle = new Guzzle();
        $credential = Credential::fromArray($credentials);
        $httpClient = new HttpClient($guzzle, $options + ['base_uri' => self::BASE_URI]);

        return new Client($httpClient, $credential);
    }
}
