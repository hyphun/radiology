<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use App\Models\ProgramCategory;
use App\Models\Program;
use Filament\Forms\Components\RichEditor;
class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                ->required()
                ->maxLength(255),
            Select::make('category_id')
                ->label('Category')
                ->options(
                    ProgramCategory::query()
                        ->orderBy('name')
                        ->pluck('name', 'id')
                )
                ->searchable()
                ->required(),
            Textarea::make('short_description')
                ->rows(3)->columnSpanFull(),
            RichEditor::make('description')
                ->label('Content')
                ->required()
                ->columnSpanFull(),

            FileUpload::make('thumbnail_image')
                ->image()
                ->disk('public_direct')
                ->directory('programs/thumbnails')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(2048)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->nullable()
                ->columnSpanFull(),

            FileUpload::make('large_image')
                ->image()
                ->disk('public_direct')
                ->directory('programs/large')
                ->visibility('public')
                ->imageEditor()
                ->maxSize(4096)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->nullable()
                ->columnSpanFull(),

            Select::make('status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->default('active')
                ->required(),
            TextInput::make('meta_title')
                ->label('Meta SEO title')
                ->maxLength(255),
            Textarea::make('meta_description')
                ->label('Meta SEO description')
                ->rows(3),
            TextInput::make('program_url')
                ->label('Program URL')
                ->helperText('Leave empty to auto-generate from title'),
            Textarea::make('additional_details')
                ->rows(4)
                ->helperText('JSON or extra notes; optional.')
                ->nullable(),
            ]);
    }
}
