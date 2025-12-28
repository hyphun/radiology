<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class ProgramCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'order',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    // Parent category relationship
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProgramCategory::class, 'parent_id');
    }

    // Child categories relationship
    public function children(): HasMany
    {
        return $this->hasMany(ProgramCategory::class, 'parent_id')->orderBy('order');
    }

    // Programs in this category
    public function programs(): HasMany
    {
        return $this->hasMany(Program::class, 'category_id');
    }

    // Auto-generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Check if category is parent
    public function isParent(): bool
    {
        return is_null($this->parent_id);
    }

    // Get all descendants
    public function allChildren(): HasMany
    {
        return $this->children()->with('allChildren');
    }
}
