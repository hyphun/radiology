<?php

namespace App\Filament\Resources\HomeTeamMembers\Pages;

use App\Filament\Resources\HomeTeamMembers\HomeTeamMemberResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHomeTeamMember extends ViewRecord
{
    protected static string $resource = HomeTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
