<?php

namespace App\Filament\Resources\HomeTeamMembers\Pages;

use App\Filament\Resources\HomeTeamMembers\HomeTeamMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeTeamMembers extends ListRecords
{
    protected static string $resource = HomeTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
