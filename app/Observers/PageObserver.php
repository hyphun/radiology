<?php

namespace App\Observers;

use App\Helpers\CacheHelper;
use App\Models\Page;
use Illuminate\Support\Facades\Log;

class PageObserver
{
    public function created(Page $page): void
    {
        CacheHelper::refreshPageCache();
    }

    public function updated(Page $page): void
    {
        CacheHelper::refreshPageCache();
    }

    public function deleted(Page $page): void
    {
        CacheHelper::refreshPageCache();
    }

    public function restored(Page $page): void
    {
        CacheHelper::refreshPageCache();
    }

    public function forceDeleted(Page $page): void
    {
        CacheHelper::refreshPageCache();
    }
}
