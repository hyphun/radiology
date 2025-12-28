<?php

namespace App\Filament\Resources\HomeHeroSliders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Toggle;
class HomeHeroSliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('subtitle')
                    ->required(),
                TextInput::make('cta_text')
                    ->required(),
                TextInput::make('cta_url')
                    ->required(),
                TextInput::make('order')
                ->label('Display Order')
                ->numeric()
                ->default(0)
                ->helperText('Lower numbers appear first')
                ->required(),
                FileUpload::make('image')
                ->label('Banner Image')
                ->image()
                ->disk('public_direct')
                ->directory('banners')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(4096)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->nullable()
                ->columnSpanFull()
            ]);
    }
}
