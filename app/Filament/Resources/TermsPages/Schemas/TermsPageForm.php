<?php

namespace App\Filament\Resources\TermsPages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
class TermsPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                ->required(),
                RichEditor::make('content')
                ->label('Content')
                ->columnSpanFull(),
            ]);
    }
}
