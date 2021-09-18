<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface AgentRepositoryInterface extends EloquentRepositoryInterface
{
    public function randomId(): int;
    public function paginated_results(int $per_pages): LengthAwarePaginator;
}
