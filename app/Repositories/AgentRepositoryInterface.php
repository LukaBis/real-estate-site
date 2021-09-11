<?php

namespace App\Repositories;

interface AgentRepositoryInterface extends EloquentRepositoryInterface
{
    public function randomId(): int;
}
