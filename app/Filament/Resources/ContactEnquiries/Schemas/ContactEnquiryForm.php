<?php

namespace App\Filament\Resources\ContactEnquiries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

use Filament\Forms\Form;
use Filament\Schemas\Components\Section;

class ContactEnquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Section::make('Enquiry Details')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    TextInput::make('phone')
                        ->tel()
                        ->maxLength(20),
                    TextInput::make('subject')
                        ->maxLength(255),
                    Textarea::make('message')
                        ->required()
                        ->rows(5)
                        ->columnSpanFull(),
                ])
                ->columns(1),
            Section::make('Status')
                ->schema([
                    Select::make('status')
                        ->options([
                            'pending' => 'Pending',
                            'replied' => 'Replied',
                            'closed' => 'Closed',
                        ])
                        ->default('pending')
                        ->required(),
                ])
                ->columns(1),
            ]);
    }
}
