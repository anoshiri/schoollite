<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArmResource\Pages;
use App\Filament\Resources\ArmResource\RelationManagers;
use App\Models\Arm;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArmResource extends Resource
{
    protected static ?string $model = Arm::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),

	            Forms\Components\TextInput::make('description'),

	            Forms\Components\Select::make('grade_id')
                    ->label('Grade')
                    ->options(Grade::isActive()->pluck('name', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),

                Tables\Columns\TextColumn::make('grade.name')
                    ->label('Grade'),
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
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArms::route('/'),
            'create' => Pages\CreateArm::route('/create'),
            'edit' => Pages\EditArm::route('/{record}/edit'),
        ];
    }
}
