<?php

function freshToken(): array
{
    return [
        "access_token" => "ACCESS_TOKEN",
        "token_type" => "bearer",
        "created_at" => (int) gmdate('U'),
        "expires_in" => 7200,
        "refresh_token" => "REFRESH_TOKEN"
    ];
}

function expiredToken(): array
{
    return [
        "access_token" => "ACCESS_TOKEN",
        "token_type" => "bearer",
        "created_at" => 10000,
        "expires_in" => 7200,
        "refresh_token" => "REFRESH_TOKEN"
    ];
}
