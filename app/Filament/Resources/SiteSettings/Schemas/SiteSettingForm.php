<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('address')->label('Contact page addresses')
                    ->columnSpanFull(),
                RichEditor::make('phone')->label('Contact page phone numbers')
                    ->columnSpanFull(),
                RichEditor::make('email')->label('Contact page email addresses')
                    ->label('Email address')
                    ->columnSpanFull(),
                TextInput::make('site_domain'),
                TextInput::make('site_name'),
                FileUpload::make('site_logo')
                ->image()
                ->disk('public_direct')
                ->directory('site/logos')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(4096)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])->columnSpanFull(),
                FileUpload::make('site_logo_dark')
                ->image()
                ->disk('public_direct')
                ->directory('site/logos')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(4096)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->nullable(),
                FileUpload::make('site_logo_mobile')
                ->image()
                ->disk('public_direct')
                ->directory('site/logos')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(4096)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->nullable(),

                TextInput::make('primary_contact')->label('Top Header contact number'),
                TextInput::make('primary_email')->label('Top Header email address'),
                TextInput::make('primary_address')->label('Top Header Address'),
                TextInput::make('footer_bio')->label('Footer Bio'),
                TextInput::make('facebook_profile')->label('Facebook Profile URL'),
                TextInput::make('linkedin_profile')->label('LinkedIn Profile URL'),
                TextInput::make('twitter_profile')->label('Twitter Profile URL'),
                Textarea::make('map_embed_code')->label('Google Map Embed Code')->required()->columnSpanFull(),
            ]);
    }
}
