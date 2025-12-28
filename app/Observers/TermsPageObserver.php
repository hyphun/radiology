<?php

namespace App\Observers;

use App\Models\TermsPage;
use Cache;
class TermsPageObserver
{
     /**
     * Handle the TermsPage "created" event.
     */
    public function created(TermsPage $termsPage): void
    {
        Cache::forget('static_page_terms');
    }

    /**
     * Handle the TermsPage "updated" event.
     */
    public function updated(TermsPage $termsPage): void
    {
        Cache::forget('static_page_terms');
    }

    /**
     * Handle the TermsPage "deleted" event.
     */
    public function deleted(TermsPage $termsPage): void
    {
        Cache::forget('static_page_terms');
    }

    /**
     * Handle the TermsPage "restored" event.
     */
    public function restored(TermsPage $termsPage): void
    {
        Cache::forget('static_page_terms');
    }

    /**
     * Handle the TermsPage "force deleted" event.
     */
    public function forceDeleted(TermsPage $termsPage): void
    {
        Cache::forget('static_page_terms');
    }
}
