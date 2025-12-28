<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomeHeroSlider extends Model
{
    protected $fillable = ['title', 'subtitle', 'cta_text', 'cta_url', 'image', 'order', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }
        return asset('uploads/'.$this->image);
    }


    public static function getActiveSliders(): self
    {
        return self::where('is_active', true)->orderBy('order')->get();
    }
}
