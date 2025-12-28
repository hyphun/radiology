<?php

namespace App\Filament\Resources\ProgramCategories\Schemas;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

use Filament\Forms\Components\Textarea;
use App\Models\ProgramCategory;
use Filament\Forms\Form;
use Filament\Schemas\Components\Section;

class ProgramCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('slug')
                ->maxLength(255)
                ->helperText('Leave empty to auto-generate from name'),
            Select::make('parent_id')
                ->label('Parent category')
                ->options(
                    ProgramCategory::query()
                        ->orderBy('name')
                        ->pluck('name', 'id')
                )
                ->searchable()
                ->nullable(),
            TextInput::make('order')
                ->numeric()
                ->default(0),
            Select::make('status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->default('active')
                ->required(),
            ]);
    }
}
