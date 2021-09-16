<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface PropertyRepositoryInterface extends EloquentRepositoryInterface
{
    public function paginate_all(int $per_pages, array $relations = []): LengthAwarePaginator;
    public function getAllDifferentStatuses(): Collection;
}
