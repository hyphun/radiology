<?php

namespace App\Filament\Resources\HomeTeamMembers\Pages;

use App\Filament\Resources\HomeTeamMembers\HomeTeamMemberResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeTeamMember extends EditRecord
{
    protected static string $resource = HomeTeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
