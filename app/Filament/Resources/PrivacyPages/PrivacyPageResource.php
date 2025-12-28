<?php

namespace App\Filament\Resources\PrivacyPages;

use App\Filament\Resources\PrivacyPages\Pages\CreatePrivacyPage;
use App\Filament\Resources\PrivacyPages\Pages\EditPrivacyPage;
use App\Filament\Resources\PrivacyPages\Pages\ListPrivacyPages;
use App\Filament\Resources\PrivacyPages\Schemas\PrivacyPageForm;
use App\Filament\Resources\PrivacyPages\Tables\PrivacyPagesTable;
use App\Models\PrivacyPage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class PrivacyPageResource extends Resource
{
    protected static ?string $model = PrivacyPage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Document;
    protected static ?string $navigationLabel = 'Privacy Page';
    protected static ?int $navigationSort = 14;
    protected static string|UnitEnum|null $navigationGroup = 'Content Management';

    public static function form(Schema $schema): Schema
    {
        return PrivacyPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrivacyPagesTable::configure($table);
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
            'index' => ListPrivacyPages::route('/'),
            'create' => CreatePrivacyPage::route('/create'),
            'edit' => EditPrivacyPage::route('/{record}/edit'),
        ];
    }
}
