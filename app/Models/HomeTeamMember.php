<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomeTeamMember extends Model
{
    protected $fillable = ['name', 'designation', 'image', 'facebook_profile_url', 'linkedin_profile_url', 'twitter_profile_url', 'order', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $appends = ['image_url'];
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image){
            return null;
        }

        return asset('uploads/'.$this->image);
    }

}
