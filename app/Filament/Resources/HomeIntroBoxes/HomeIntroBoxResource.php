<?php

namespace App\Filament\Resources\HomeIntroBoxes;

use App\Filament\Resources\HomeIntroBoxes\Pages\CreateHomeIntroBox;
use App\Filament\Resources\HomeIntroBoxes\Pages\EditHomeIntroBox;
use App\Filament\Resources\HomeIntroBoxes\Pages\ListHomeIntroBoxes;
use App\Filament\Resources\HomeIntroBoxes\Pages\ViewHomeIntroBox;
use App\Filament\Resources\HomeIntroBoxes\Schemas\HomeIntroBoxForm;
use App\Filament\Resources\HomeIntroBoxes\Schemas\HomeIntroBoxInfolist;
use App\Filament\Resources\HomeIntroBoxes\Tables\HomeIntroBoxesTable;
use App\Models\HomeIntroBox;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class HomeIntroBoxResource extends Resource
{
    protected static ?string $model = HomeIntroBox::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CubeTransparent;
    protected static ?string $navigationLabel = 'Home Page Feature Boxes';
    protected static ?int $navigationSort = 3;
    protected static string|UnitEnum|null $navigationGroup = 'Home Page Management';

    public static function form(Schema $schema): Schema
    {
        return HomeIntroBoxForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HomeIntroBoxInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeIntroBoxesTable::configure($table);
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
            'index' => ListHomeIntroBoxes::route('/'),
            'create' => CreateHomeIntroBox::route('/create'),
            'view' => ViewHomeIntroBox::route('/{record}'),
            'edit' => EditHomeIntroBox::route('/{record}/edit'),
        ];
    }
}
