<?php

namespace App\Repositories;

interface TypeRepositoryInterface extends EloquentRepositoryInterface
{
    public function allTypesInArray(): array;
}
