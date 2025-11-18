<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('office_name'),
                DatePicker::make('start_year'),
                DatePicker::make('leave_year'),
                Toggle::make('is_running')
                    ->required(),
                TextInput::make('position'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('website_url'),
                Select::make('status')
                    ->options(['Active' => 'Active', 'Inactive' => 'Inactive'])
                    ->default('Active')
                    ->required(),
            ]);
    }
}
