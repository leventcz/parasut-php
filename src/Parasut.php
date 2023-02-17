<?php

declare(strict_types=1);

namespace Leventcz\Parasut;

use GuzzleHttp\Client as Guzzle;
use Leventcz\Parasut\Http\HttpClient;
use Leventcz\Parasut\ValueObjects\Credential;

final class Parasut
{
    /**
     * @param  array  $credentials
     * @param  array  $options
     * @return Client
     */
    public static function client(array $credentials, array $options = []): Client
    {
        $guzzle = new Guzzle();
        $credential = Credential::fromArray($credentials);
        $httpClient = new HttpClient($guzzle, $credential, $options);

        return new Client($httpClient);
    }
}
