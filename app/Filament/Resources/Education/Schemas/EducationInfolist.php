<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EducationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('institute_name'),
                TextEntry::make('start_year')
                    ->date(),
                TextEntry::make('leave_year')
                    ->date(),
                IconEntry::make('is_running')
                    ->boolean(),
                TextEntry::make('result'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
