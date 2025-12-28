<?php

namespace App\Filament\Resources\PrivacyPages\Pages;

use App\Filament\Resources\PrivacyPages\PrivacyPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPrivacyPages extends ListRecords
{
    protected static string $resource = PrivacyPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //CreateAction::make(),
        ];
    }
}
