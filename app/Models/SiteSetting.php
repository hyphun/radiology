<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'email',
        'site_domain',
        'site_logo',
        'site_logo_dark',
        'site_logo_mobile',
        'site_name',
        'primary_contact',
        'primary_address',
        'primary_email',
        'footer_bio',
        'facebook_profile',
        'linkedin_profile',
        'twitter_profile',
        'map_embed_code',
    ];

    // protected $casts = [
    //     'address' => 'array', // For rich text if needed
    //     'phone' => 'array',
    //     'email' => 'array',
    // ];

    protected $appends = ['site_logo_image','site_logo_dark_image','site_logo_mobile_image'];

    public function getSiteLogoImageAttribute(): ?string
    {
        if (!$this->site_logo) {
            return null;
        }
        return asset('uploads/'.$this->site_logo);
    }
    public function getSiteLogoDarkImageAttribute(): ?string
    {
        if (!$this->site_logo_dark) {
            return null;
        }
        return asset('uploads/'.$this->site_logo_dark);
    }
    public function getSiteLogoMobileImageAttribute(): ?string
    {
        if (!$this->site_logo_mobile) {
            return null;
        }
        return asset('uploads/'.$this->site_logo_mobile);
    }




    /**
     * Scope for single instance
     */
    public static function firstOrCreateDefault(): self
    {
        return self::first() ?? self::create([]);
    }
}
