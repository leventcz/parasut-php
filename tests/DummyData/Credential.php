<?php

function credential(): array
{
    return [
        'client_id' => 'CLIENT_ID',
        'client_secret' => 'CLIENT_SECRET',
        'company_id' => 'COMPANY_ID',
        'username' => 'USERNAME',
        'password' => 'PASSWORD'
    ];
}

function invalidCredential(): array
{
    return [
        'smth_invalid' => true,
        'company_id' => 'COMPANY_ID',
    ];
}
