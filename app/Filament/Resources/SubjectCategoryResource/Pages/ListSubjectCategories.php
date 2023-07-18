<?php

namespace App\Filament\Resources\SubjectCategoryResource\Pages;

use App\Filament\Resources\SubjectCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubjectCategories extends ListRecords
{
    protected static string $resource = SubjectCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
