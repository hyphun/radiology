<?php

namespace App\Filament\Resources\PrivacyPages\Pages;

use App\Filament\Resources\PrivacyPages\PrivacyPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPrivacyPage extends EditRecord
{
    protected static string $resource = PrivacyPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //DeleteAction::make(),
        ];
    }
}
