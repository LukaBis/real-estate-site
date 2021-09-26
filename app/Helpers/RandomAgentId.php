<?php

namespace App\Helpers;

class RandomAgentId
{
    public static function agent()
    {
        return app(\App\Repositories\Eloquent\AgentRepository::class)->randomId();
    }
}
