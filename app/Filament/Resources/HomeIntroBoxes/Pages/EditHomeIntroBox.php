<?php

namespace App\Filament\Resources\HomeIntroBoxes\Pages;

use App\Filament\Resources\HomeIntroBoxes\HomeIntroBoxResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeIntroBox extends EditRecord
{
    protected static string $resource = HomeIntroBoxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
