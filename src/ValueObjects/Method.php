<?php

declare(strict_types=1);

namespace Leventcz\Parasut\ValueObjects;

enum Method
{
    case GET;
    case POST;
    case PUT;
    case PATCH;
    case DELETE;
}
