<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectCategoryResource\Pages;
use App\Filament\Resources\SubjectCategoryResource\RelationManagers;
use App\Models\SubjectCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubjectCategoryResource extends Resource
{
    protected static ?string $model = SubjectCategory::class;

    protected static ?string $pluralModelLabel = 'Subject Groups';
    protected static ?string $navigationLabel = 'Subject Groups';
    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()->searchable(),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()->searchable()
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\SubjectsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubjectCategories::route('/'),
            'create' => Pages\CreateSubjectCategory::route('/create'),
            'edit' => Pages\EditSubjectCategory::route('/{record}/edit'),
        ];
    }    
}
