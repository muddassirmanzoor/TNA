<?php

namespace App\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use App\Traits\DynamicConnectionTrait;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use DynamicConnectionTrait;

    public function __construct()
    {
        // You can apply the below variable dynamically and model
        // will use that new connection
        $this->connection = $this->determineConnection();

    }
}

