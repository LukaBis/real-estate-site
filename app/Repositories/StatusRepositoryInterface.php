<?php

namespace App\Repositories;

interface StatusRepositoryInterface extends EloquentRepositoryInterface
{
    public function idArray(): array;
}
