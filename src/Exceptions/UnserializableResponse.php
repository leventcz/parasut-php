<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Exceptions;

use JsonException;

class UnserializableResponse extends ClientException
{
    /**
     * @param  JsonException  $exception
     */
    public function __construct(JsonException $exception)
    {
        parent::__construct($exception->getMessage(), 0, $exception);
    }
}
