<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('office_id')
                    ->label('Office')
                    ->relationship('office', 'office_name')
                    ->searchable()
                    ->nullable(),
                TextInput::make('office_name')
                    ->label('Office Name')
                    ->nullable(),
                FileUpload::make('office_logo')
                    ->label('Office Logo')
                    ->multiple(false) // usually office logo is single
                    ->image()
                    ->disk('public')
                    ->directory('uploads/project/office_logo')
                    ->visibility('public')
                    ->nullable(),
                TextInput::make('office_web_url')
                    ->label('Office Website')
                    ->url()
                    ->nullable(),
                Select::make('categories')
                    ->label('Categories')
                    ->multiple()
                    ->relationship('categories', 'category_id'),
                Select::make('technologies')
                    ->label('Technologies')
                    ->multiple()
                    ->relationship('technologies', 'technology_id'),

                TextInput::make('client_source'),
                TextInput::make('client_name'),
                TextInput::make('name'),
                TextInput::make('slug')
                    ->required(),
                FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('uploads/project/thumbnail')
                    ->visibility('public')
                    ->maxSize(10240)
                    ->required(),
                Textarea::make('short_description'),
                TextInput::make('role'),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
                Toggle::make('is_office_project')
                    ->required(),
                Toggle::make('is_complete')
                    ->required(),
                Textarea::make('challenges')
                    ->columnSpanFull(),
                Textarea::make('solutions')
                    ->columnSpanFull(),
                TextInput::make('website_url'),
                TextInput::make('admin_dashboard_url'),
                TextInput::make('google_play_store_url'),
                TextInput::make('apple_store_url'),
                TextInput::make('api_documentation_url'),
                Select::make('status')
                    ->options(['Active' => 'Active', 'Inactive' => 'Inactive'])
                    ->default('Active')
                    ->required(),
                Repeater::make('photos')
                    ->relationship('photos')
                    ->schema([
                        FileUpload::make('photo')
                            ->image()
                            ->disk('public')
                            ->directory('uploads/project/photos')
                            ->visibility('public'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
