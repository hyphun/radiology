<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'short_description',
        'description',
        'thumbnail_image',
        'large_image',
        'status',
        'meta_title',
        'meta_description',
        'program_url',
        'cta_text',
        'additional_details',
    ];

    protected $casts = [
        'additional_details' => 'array',
        'status' => 'string',
    ];

    protected $appends = ['banner_large_image_url','banner_thumbnail_image_url'];

    public function getBannerLargeImageUrlAttribute(): ?string
    {
        if (!$this->large_image) {
            return null;
        }
        return asset('/uploads/'.$this->large_image);
    }

    public function getBannerThumbnailImageUrlAttribute(): ?string
    {
        if(!$this->thumbnail_image) {
            return null;
        }

        return asset('/uploads/'.$this->thumbnail_image);
    }

    // Category relationship
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProgramCategory::class, 'category_id');
    }


    // Auto-generate slug and program_url
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->title);
            }
            if (empty($program->program_url)) {
                $program->program_url = '/programs/' . $program->slug;
            }
        });

        static::updating(function ($program) {
            if ($program->isDirty('title') && empty($program->slug)) {
                $program->slug = Str::slug($program->title);
            }
        });
    }

    // Accessor for full URL
    public function getFullUrlAttribute(): string
    {
        return url($this->program_url);
    }
}
