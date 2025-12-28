<?php

namespace App\Filament\Resources\HomeTeamMembers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
class HomeTeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('designation')
                    ->required(),
                FileUpload::make('image')
                ->label('Member Image')
                ->image()
                ->disk('public_direct')
                ->directory('team_members')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(4096)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->nullable()
                ->columnSpanFull(),
                TextInput::make('facebook_profile_url')
                    ->url(),
                TextInput::make('linkedin_profile_url')
                    ->url(),
                TextInput::make('twitter_profile_url')
                    ->url(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
