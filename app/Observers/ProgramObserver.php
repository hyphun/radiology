<?php

namespace App\Observers;

use App\Helpers\CacheHelper;
use App\Models\Program;
use Illuminate\Support\Facades\Log;

class ProgramObserver
{
    public function created(Program $program): void
    {
        CacheHelper::refreshProgramCache();
    }

    public function updated(Program $program): void
    {
        CacheHelper::refreshProgramCache();
    }

    public function deleted(Program $program): void
    {
        CacheHelper::refreshProgramCache();
    }

    public function restored(Program $program): void
    {
        CacheHelper::refreshProgramCache();
    }

    public function forceDeleted(Program $program): void
    {
        CacheHelper::refreshProgramCache();
    }
}
