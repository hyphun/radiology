<?php

namespace App\Filament\Resources\HomeTeamMembers\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HomeTeamMemberInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('designation'),
                ImageEntry::make('image')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('facebook_profile_url')
                    ->placeholder('-'),
                TextEntry::make('linkedin_profile_url')
                    ->placeholder('-'),
                TextEntry::make('twitter_profile_url')
                    ->placeholder('-'),
                TextEntry::make('order')
                    ->numeric(),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
