<?php

namespace App\Observers;

use App\Models\SiteSetting;
use App\Helpers\CacheHelper;
class SiteSettingObserver
{
    /**
     * Handle the SiteSetting "created" event.
     */
    public function created(SiteSetting $siteSetting): void
    {
        CacheHelper::refreshSiteSettingCache();
    }

    /**
     * Handle the SiteSetting "updated" event.
     */
    public function updated(SiteSetting $siteSetting): void
    {
        CacheHelper::refreshSiteSettingCache();
    }

    /**
     * Handle the SiteSetting "deleted" event.
     */
    public function deleted(SiteSetting $siteSetting): void
    {
        CacheHelper::refreshSiteSettingCache();
    }

    /**
     * Handle the SiteSetting "restored" event.
     */
    public function restored(SiteSetting $siteSetting): void
    {
        CacheHelper::refreshSiteSettingCache();
    }

    /**
     * Handle the SiteSetting "force deleted" event.
     */
    public function forceDeleted(SiteSetting $siteSetting): void
    {
        CacheHelper::refreshSiteSettingCache();
    }
}
