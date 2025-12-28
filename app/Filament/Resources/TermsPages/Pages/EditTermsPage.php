<?php

namespace App\Filament\Resources\TermsPages\Pages;

use App\Filament\Resources\TermsPages\TermsPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTermsPage extends EditRecord
{
    protected static string $resource = TermsPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //DeleteAction::make(),
        ];
    }
}
