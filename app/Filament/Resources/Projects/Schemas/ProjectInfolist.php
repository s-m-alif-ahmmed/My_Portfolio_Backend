<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('office_id')
                    ->numeric(),
                TextEntry::make('office_name'),
                TextEntry::make('office_logo'),
                TextEntry::make('office_web_url'),
                TextEntry::make('client_source'),
                TextEntry::make('client_name'),
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('thumbnail'),
                TextEntry::make('short_description'),
                TextEntry::make('start_date')
                    ->date(),
                TextEntry::make('end_date')
                    ->date(),
                IconEntry::make('is_office_project')
                    ->boolean(),
                IconEntry::make('is_complete')
                    ->boolean(),
                TextEntry::make('role'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
