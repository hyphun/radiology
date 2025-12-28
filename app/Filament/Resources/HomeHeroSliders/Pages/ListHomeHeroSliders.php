<?php

namespace App\Filament\Resources\HomeHeroSliders\Pages;

use App\Filament\Resources\HomeHeroSliders\HomeHeroSliderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeHeroSliders extends ListRecords
{
    protected static string $resource = HomeHeroSliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
