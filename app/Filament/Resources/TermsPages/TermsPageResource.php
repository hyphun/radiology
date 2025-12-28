<?php

namespace App\Filament\Resources\TermsPages;

use App\Filament\Resources\TermsPages\Pages\CreateTermsPage;
use App\Filament\Resources\TermsPages\Pages\EditTermsPage;
use App\Filament\Resources\TermsPages\Pages\ListTermsPages;
use App\Filament\Resources\TermsPages\Schemas\TermsPageForm;
use App\Filament\Resources\TermsPages\Tables\TermsPagesTable;
use App\Models\TermsPage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class TermsPageResource extends Resource
{
    protected static ?string $model = TermsPage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Document;
    protected static ?string $navigationLabel = 'Terms & Condition Page';
    protected static ?int $navigationSort = 14;
    protected static string|UnitEnum|null $navigationGroup = 'Content Management';

    public static function form(Schema $schema): Schema
    {
        return TermsPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TermsPagesTable::configure($table);
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
            'index' => ListTermsPages::route('/'),
            'create' => CreateTermsPage::route('/create'),
            'edit' => EditTermsPage::route('/{record}/edit'),
        ];
    }
}
