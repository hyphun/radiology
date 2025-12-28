<?php

namespace App\Filament\Resources\HomeIntroBoxes\Pages;

use App\Filament\Resources\HomeIntroBoxes\HomeIntroBoxResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHomeIntroBox extends ViewRecord
{
    protected static string $resource = HomeIntroBoxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
