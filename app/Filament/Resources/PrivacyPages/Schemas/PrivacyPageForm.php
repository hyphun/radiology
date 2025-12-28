<?php

namespace App\Filament\Resources\PrivacyPages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
class PrivacyPageForm
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
