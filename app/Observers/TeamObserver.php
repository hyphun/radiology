<?php

namespace App\Observers;

use App\Models\HomeTeamMember;
use Cache;
class TeamObserver
{
    /**
     * Handle the HomeTeamMember "created" event.
     */
    public function created(HomeTeamMember $homeTeamMember): void
    {
        Cache::forget('homepage_team_members');
    }

    /**
     * Handle the HomeTeamMember "updated" event.
     */
    public function updated(HomeTeamMember $homeTeamMember): void
    {
          Cache::forget('homepage_team_members');
    }

    /**
     * Handle the HomeTeamMember "deleted" event.
     */
    public function deleted(HomeTeamMember $homeTeamMember): void
    {
          Cache::forget('homepage_team_members');
    }

    /**
     * Handle the HomeTeamMember "restored" event.
     */
    public function restored(HomeTeamMember $homeTeamMember): void
    {
          Cache::forget('homepage_team_members');
    }

    /**
     * Handle the HomeTeamMember "force deleted" event.
     */
    public function forceDeleted(HomeTeamMember $homeTeamMember): void
    {
          Cache::forget('homepage_team_members');
    }
}
