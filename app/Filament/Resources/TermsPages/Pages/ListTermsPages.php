<?php

namespace App\Filament\Resources\TermsPages\Pages;

use App\Filament\Resources\TermsPages\TermsPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTermsPages extends ListRecords
{
    protected static string $resource = TermsPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //CreateAction::make(),
        ];
    }
}
