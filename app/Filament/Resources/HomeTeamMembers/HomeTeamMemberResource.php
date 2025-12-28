<?php

namespace App\Filament\Resources\HomeTeamMembers;

use App\Filament\Resources\HomeTeamMembers\Pages\CreateHomeTeamMember;
use App\Filament\Resources\HomeTeamMembers\Pages\EditHomeTeamMember;
use App\Filament\Resources\HomeTeamMembers\Pages\ListHomeTeamMembers;
use App\Filament\Resources\HomeTeamMembers\Pages\ViewHomeTeamMember;
use App\Filament\Resources\HomeTeamMembers\Schemas\HomeTeamMemberForm;
use App\Filament\Resources\HomeTeamMembers\Schemas\HomeTeamMemberInfolist;
use App\Filament\Resources\HomeTeamMembers\Tables\HomeTeamMembersTable;
use App\Models\HomeTeamMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class HomeTeamMemberResource extends Resource
{
    protected static ?string $model = HomeTeamMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;
    protected static ?string $navigationLabel = 'Home Page Teams';
    protected static ?int $navigationSort = 2;
    protected static string|UnitEnum|null $navigationGroup = 'Home Page Management';

    public static function form(Schema $schema): Schema
    {
        return HomeTeamMemberForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HomeTeamMemberInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeTeamMembersTable::configure($table);
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
            'index' => ListHomeTeamMembers::route('/'),
            'create' => CreateHomeTeamMember::route('/create'),
            'view' => ViewHomeTeamMember::route('/{record}'),
            'edit' => EditHomeTeamMember::route('/{record}/edit'),
        ];
    }
}
