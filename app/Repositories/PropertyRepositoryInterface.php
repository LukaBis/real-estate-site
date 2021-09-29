<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface PropertyRepositoryInterface extends EloquentRepositoryInterface
{
    public function paginate_filtered_results(int $per_pages, $request): LengthAwarePaginator;
    public function allCities(): array;
    public function allBedsNumbers(): array;
    public function allGarageNumbers(): array;
    public function allBathsNumbers(): array;
    public function updateProperty($propertyId, $propertyData, $amenityIds): void;
    public function verticalImageFilename($id): string;
    public function allHorizontalImages($id): array;
    public function removeAgent($agentId): void;
}
