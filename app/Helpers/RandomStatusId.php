<?php

namespace App\Helpers;

class RandomStatusId
{
    public static function status()
    {
        return app(\App\Repositories\Eloquent\StatusRepository::class)->randomId();
    }

}
