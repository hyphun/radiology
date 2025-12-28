<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Toggle;
class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                RichEditor::make('content')
                ->label('Content')

                ->required()
                ->columnSpanFull(),
                FileUpload::make('banner_image')
                ->image()
                ->disk('public_direct')
                ->directory('pages/banners')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(4096)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->nullable()
                ->columnSpanFull(),
                Section::make('Settings')
                ->columnSpanFull()
            ->schema([
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->default('active')
                    ->required(),

                Toggle::make('show_in_nav')
                    ->label('Show in Navigation')
                    ->default(true)
                    ->helperText('Display this page in header navigation'),

                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower numbers appear first'),
            ])
            ->columns(3),
                TextArea::make('meta_seo'),
            ]);
    }
}
