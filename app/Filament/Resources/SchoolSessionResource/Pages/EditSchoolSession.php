<?php

namespace App\Filament\Resources\SchoolSessionResource\Pages;

use App\Filament\Resources\SchoolSessionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchoolSession extends EditRecord
{
    protected static string $resource = SchoolSessionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
