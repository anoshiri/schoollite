<?php

namespace App\Filament\Resources\ArmResource\Pages;

use App\Filament\Resources\ArmResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArm extends EditRecord
{
    protected static string $resource = ArmResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
