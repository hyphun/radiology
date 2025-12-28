<?php

namespace App\Observers;

use App\Models\HomeIntroBox;
use Cache;
class IntroBoxObserver
{
    /**
     * Handle the HomeIntroBox "created" event.
     */
    public function created(HomeIntroBox $homeIntroBox): void
    {
        Cache::forget('homepage_intro_boxes');
    }

    /**
     * Handle the HomeIntroBox "updated" event.
     */
    public function updated(HomeIntroBox $homeIntroBox): void
    {
        Cache::forget('homepage_intro_boxes');
    }

    /**
     * Handle the HomeIntroBox "deleted" event.
     */
    public function deleted(HomeIntroBox $homeIntroBox): void
    {
         Cache::forget('homepage_intro_boxes');
    }

    /**
     * Handle the HomeIntroBox "restored" event.
     */
    public function restored(HomeIntroBox $homeIntroBox): void
    {
         Cache::forget('homepage_intro_boxes');
    }

    /**
     * Handle the HomeIntroBox "force deleted" event.
     */
    public function forceDeleted(HomeIntroBox $homeIntroBox): void
    {
         Cache::forget('homepage_intro_boxes');
    }
}
