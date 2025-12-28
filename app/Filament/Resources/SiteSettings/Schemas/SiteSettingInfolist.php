<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SiteSettingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('phone')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('site_domain')
                    ->placeholder('-'),
                TextEntry::make('site_logo')
                    ->placeholder('-'),
                TextEntry::make('site_name')
                    ->placeholder('-'),
                TextEntry::make('primary_contact')
                    ->placeholder('-'),
                TextEntry::make('primary_address')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
