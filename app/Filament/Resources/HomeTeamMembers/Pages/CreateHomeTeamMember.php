<?php

namespace App\Filament\Resources\HomeTeamMembers\Pages;

use App\Filament\Resources\HomeTeamMembers\HomeTeamMemberResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeTeamMember extends CreateRecord
{
    protected static string $resource = HomeTeamMemberResource::class;
}
