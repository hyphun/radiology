<?php

namespace App\Filament\Resources\ProgramCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\ProgramCategory;
class ProgramCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->query(fn () => ProgramCategory::query()->with('parent'))
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('parent.name')
                    ->label('Parent Category')
                    ->searchable()
                    ->default('—')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                        default => 'gray',
                    })
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
