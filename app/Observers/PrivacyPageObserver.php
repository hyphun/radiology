<?php

namespace App\Observers;

use App\Models\PrivacyPage;
use Cache;
class PrivacyPageObserver
{
    /**
     * Handle the PrivacyPage "created" event.
     */
    public function created(PrivacyPage $privacyPage): void
    {
        Cache::forget('static_page_privacy');
    }

    /**
     * Handle the PrivacyPage "updated" event.
     */
    public function updated(PrivacyPage $privacyPage): void
    {
          Cache::forget('static_page_privacy');
    }

    /**
     * Handle the PrivacyPage "deleted" event.
     */
    public function deleted(PrivacyPage $privacyPage): void
    {
          Cache::forget('static_page_privacy');
    }

    /**
     * Handle the PrivacyPage "restored" event.
     */
    public function restored(PrivacyPage $privacyPage): void
    {
          Cache::forget('static_page_privacy');
    }

    /**
     * Handle the PrivacyPage "force deleted" event.
     */
    public function forceDeleted(PrivacyPage $privacyPage): void
    {
          Cache::forget('static_page_privacy');
    }
}
