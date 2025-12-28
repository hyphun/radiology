<?php

namespace App\Services\Frontend;

use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Pagination\LengthAwarePaginator;

class ProgramService
{
    public function getPrograms(int $perPage = 12): LengthAwarePaginator
    {
        return Program::where('status', 'active')
            ->latest()
            ->paginate($perPage);
    }

    public function getProgramBySlug(string $slug): ?Program
    {
        return Program::where('slug', $slug)
            ->where('status', 'active')
            ->with('category')
            ->firstOrFail();
    }

    public function getCategoriesWithPrograms(): \Illuminate\Database\Eloquent\Collection
    {
        return ProgramCategory::where('status', 'active')
            ->with(['programs' => fn ($query) => $query->where('status', 'active')])
            ->orderBy('order')
            ->get();
    }

    public function getRelatedPrograms(Program $program, int $limit = 3): \Illuminate\Database\Eloquent\Collection
    {
        return Program::where('status', 'active')
            ->where('category_id', $program->category_id)
            ->where('id', '!=', $program->id)
            ->inRandomOrder()
            ->take($limit)
            ->get();
    }
}
