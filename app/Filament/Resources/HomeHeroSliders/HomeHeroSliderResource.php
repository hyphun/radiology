<?php

namespace App\Filament\Resources\HomeHeroSliders;

use App\Filament\Resources\HomeHeroSliders\Pages\CreateHomeHeroSlider;
use App\Filament\Resources\HomeHeroSliders\Pages\EditHomeHeroSlider;
use App\Filament\Resources\HomeHeroSliders\Pages\ListHomeHeroSliders;
use App\Filament\Resources\HomeHeroSliders\Schemas\HomeHeroSliderForm;
use App\Filament\Resources\HomeHeroSliders\Tables\HomeHeroSlidersTable;
use App\Models\HomeHeroSlider;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class HomeHeroSliderResource extends Resource
{
    protected static ?string $model = HomeHeroSlider::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Document;
    protected static ?string $navigationLabel = 'Home Page Banner Sliders';
    protected static ?int $navigationSort = 1;
    protected static string|UnitEnum|null $navigationGroup = 'Home Page Management';

    public static function form(Schema $schema): Schema
    {
        return HomeHeroSliderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeHeroSlidersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomeHeroSliders::route('/'),
            'create' => CreateHomeHeroSlider::route('/create'),
            'edit' => EditHomeHeroSlider::route('/{record}/edit'),
        ];
    }
}
