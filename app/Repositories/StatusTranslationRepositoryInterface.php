<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface StatusTranslationRepositoryInterface
{
    public function getAllDifferentStatuses(string $locale): Collection;
}
