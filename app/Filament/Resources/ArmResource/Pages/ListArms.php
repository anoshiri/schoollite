<?php

namespace App\Filament\Resources\ArmResource\Pages;

use App\Filament\Resources\ArmResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArms extends ListRecords
{
    protected static string $resource = ArmResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
