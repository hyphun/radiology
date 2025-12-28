<?php
namespace App\Helpers;

use App\Models\HomeHeroSlider;
use App\Models\HomeIntroBox;
use App\Models\HomeTeamMember;
use Illuminate\Support\Facades\Cache;

class HomepageHelper
{
    public static function getHeroSliders()
    {
        return Cache::remember('homepage_hero_sliders', 60 * 24, function () {
            return HomeHeroSlider::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }

    public static function getIntroBoxes()
    {

        return Cache::remember('homepage_intro_boxes', 60 * 24, function () {
            return HomeIntroBox::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }

    public static function getTeamMembers()
    {
        return Cache::remember('homepage_team_members', 60 * 24, function () {
            return HomeTeamMember::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }
}
