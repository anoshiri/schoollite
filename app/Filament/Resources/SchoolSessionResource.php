<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolSessionResource\Pages;
use App\Filament\Resources\SchoolSessionResource\RelationManagers;
use App\Models\SchoolSession;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchoolSessionResource extends Resource
{
    protected static ?string $model = SchoolSession::class;

    protected static ?string $pluralModelLabel = 'School Sessions';
    protected static ?string $navigationLabel = 'School Sessions';
    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('start_date')
                    ->required(),

                Forms\Components\DatePicker::make('end_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->sortable()->searchable()
                    ->date(),

                Tables\Columns\TextColumn::make('end_date')
                    ->sortable()->searchable()
                    ->date(),
                    
                Tables\Columns\TextColumn::make('updated_at')
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
            RelationManagers\SessionTermsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchoolSessions::route('/'),
            'create' => Pages\CreateSchoolSession::route('/create'),
            'edit' => Pages\EditSchoolSession::route('/{record}/edit'),
        ];
    }
}
