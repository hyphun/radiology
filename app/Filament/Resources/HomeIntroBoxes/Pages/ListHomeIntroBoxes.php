<?php

namespace App\Filament\Resources\HomeIntroBoxes\Pages;

use App\Filament\Resources\HomeIntroBoxes\HomeIntroBoxResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeIntroBoxes extends ListRecords
{
    protected static string $resource = HomeIntroBoxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //CreateAction::make(),
        ];
    }
}
