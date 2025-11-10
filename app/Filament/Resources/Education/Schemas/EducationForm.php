<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('institute_name')
                ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                DatePicker::make('start_year'),
                DatePicker::make('leave_year'),
                TextInput::make('result'),
                Toggle::make('is_running')
                    ->required(),
            ]);
    }
}
