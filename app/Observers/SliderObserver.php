<?php

namespace App\Observers;

use App\Models\HomeHeroSlider;
use Cache;
class SliderObserver
{
    /**
     * Handle the HomeHeroSlider "created" event.
     */
    public function created(HomeHeroSlider $homeHeroSlider): void
    {
        Cache::forget('homepage_hero_sliders');
    }

    /**
     * Handle the HomeHeroSlider "updated" event.
     */
    public function updated(HomeHeroSlider $homeHeroSlider): void
    {
         Cache::forget('homepage_hero_sliders');
    }

    /**
     * Handle the HomeHeroSlider "deleted" event.
     */
    public function deleted(HomeHeroSlider $homeHeroSlider): void
    {
         Cache::forget('homepage_hero_sliders');
    }

    /**
     * Handle the HomeHeroSlider "restored" event.
     */
    public function restored(HomeHeroSlider $homeHeroSlider): void
    {
         Cache::forget('homepage_hero_sliders');
    }

    /**
     * Handle the HomeHeroSlider "force deleted" event.
     */
    public function forceDeleted(HomeHeroSlider $homeHeroSlider): void
    {
         Cache::forget('homepage_hero_sliders');
    }
}
