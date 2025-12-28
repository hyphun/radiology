<?php

namespace App\Observers;

use App\Models\AboutPage;
use Cache;
class AboutPageObserver
{
    /**
     * Handle the AboutPage "created" event.
     */
    public function created(AboutPage $aboutPage): void
    {
        Cache::forget('static_page_about');
    }

    /**
     * Handle the AboutPage "updated" event.
     */
    public function updated(AboutPage $aboutPage): void
    {
        Cache::forget('static_page_about');
    }

    /**
     * Handle the AboutPage "deleted" event.
     */
    public function deleted(AboutPage $aboutPage): void
    {
        Cache::forget('static_page_about');
    }

    /**
     * Handle the AboutPage "restored" event.
     */
    public function restored(AboutPage $aboutPage): void
    {
        Cache::forget('static_page_about');
    }

    /**
     * Handle the AboutPage "force deleted" event.
     */
    public function forceDeleted(AboutPage $aboutPage): void
    {
        Cache::forget('static_page_about');
    }
}
