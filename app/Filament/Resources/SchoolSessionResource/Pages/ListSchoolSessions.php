<?php

namespace App\Filament\Resources\SchoolSessionResource\Pages;

use App\Filament\Resources\SchoolSessionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSchoolSessions extends ListRecords
{
    protected static string $resource = SchoolSessionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
