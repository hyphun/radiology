<?php

namespace App\Filament\Resources\HomeHeroSliders\Pages;

use App\Filament\Resources\HomeHeroSliders\HomeHeroSliderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeHeroSlider extends EditRecord
{
    protected static string $resource = HomeHeroSliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
