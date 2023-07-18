<?php

namespace App\Filament\Resources\SubjectCategoryResource\Pages;

use App\Filament\Resources\SubjectCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubjectCategory extends EditRecord
{
    protected static string $resource = SubjectCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
