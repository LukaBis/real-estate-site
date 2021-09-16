<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface PropertyRepositoryInterface extends EloquentRepositoryInterface
{
    public function paginate_filtered_results(int $per_pages, $request): LengthAwarePaginator;
    public function getAllDifferentStatuses(): Collection;
    public function getAllDifferentStatusesInArray(): array;
}
