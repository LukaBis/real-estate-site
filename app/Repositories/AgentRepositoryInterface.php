<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface AgentRepositoryInterface extends EloquentRepositoryInterface
{
    public function randomId(): int;
    public function paginated_results(int $per_pages): LengthAwarePaginator;
    public function image($id): string;
    public function createAgent($agentData, $choosenPropertyIds): void;
}
