<?php

namespace App\Filament\Resources\ContactEnquiries;

use App\Filament\Resources\ContactEnquiries\Pages\CreateContactEnquiry;
use App\Filament\Resources\ContactEnquiries\Pages\EditContactEnquiry;
use App\Filament\Resources\ContactEnquiries\Pages\ListContactEnquiries;
use App\Filament\Resources\ContactEnquiries\Pages\ViewContactEnquiry;
use App\Filament\Resources\ContactEnquiries\Schemas\ContactEnquiryForm;
use App\Filament\Resources\ContactEnquiries\Schemas\ContactEnquiryInfolist;
use App\Filament\Resources\ContactEnquiries\Tables\ContactEnquiriesTable;
use App\Models\ContactEnquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class ContactEnquiryResource extends Resource
{
    protected static ?string $model = ContactEnquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Envelope;
    protected static ?string $navigationLabel = 'Contact Enquiries';
    protected static ?int $navigationSort = 20;
    protected static string|UnitEnum|null $navigationGroup = 'Enquiries';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationBadge(): ?string
    {
        $pending = static::getModel()::where('status', 'pending')->count();
        $total = static::getModel()::count();
        return "{$pending}/{$total}";
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        $pending = static::getModel()::where('status', 'pending')->count();
        $total = static::getModel()::count();

        if ($pending === 0) return 'success';
        if ($pending === $total) return 'danger';
        return 'warning';
    }

    public static function form(Schema $schema): Schema
    {
        return ContactEnquiryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ContactEnquiryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactEnquiriesTable::configure($table);
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
            'index' => ListContactEnquiries::route('/'),
            //'create' => CreateContactEnquiry::route('/create'),
            'view' => ViewContactEnquiry::route('/{record}'),
            'edit' => EditContactEnquiry::route('/{record}/edit'),
        ];
    }
}
