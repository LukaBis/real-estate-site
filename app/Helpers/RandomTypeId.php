<?php

namespace App\Helpers;

class RandomTypeId
{
    public static function type()
    {
        return app(\App\Repositories\Eloquent\TypeRepository::class)->randomId();
    }
}
