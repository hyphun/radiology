<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'banner_image',
        'is_clinical',
        'status',
        'meta_seo',
        'order',
        'show_in_nav',
    ];

    protected $casts = [
        'content' => 'string',
        'meta_seo' => 'array',
        'status' => 'string',
        'show_in_nav' => 'boolean',
        'is_clinical' => 'boolean',
    ];

    protected $appends = ['banner_image_url'];

    public function getBannerImageUrlAttribute(): ?string
    {
        if (!$this->banner_image) {
            return null;
        }
        return asset('uploads/'.$this->banner_image);
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
        });

        static::updating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }else{
                $page->slug = Str::slug($page->slug);
            }
        });

    }

    public function getMetaTitleAttribute(): ?string
    {
        return $this->meta_seo['title'] ?? $this->title;
    }

    public function getMetaDescriptionAttribute(): ?string
    {
        return $this->meta_seo['description'] ?? null;
    }

    public function getMetaImageAttribute(): ?string
    {
        return $this->meta_seo['image'] ?? $this->banner_image;
    }
}
