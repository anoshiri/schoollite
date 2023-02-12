<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name'),

	            Forms\Components\TextInput::make('last_name'),

	            Forms\Components\Radio::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female'
                    ]),

	            Forms\Components\TextInput::make('date_of_birth')
                    ->date(),

	            Forms\Components\TextInput::make('email')
                    ->email(),

	            Forms\Components\TextInput::make('street'),

	            Forms\Components\TextInput::make('city'),

	            Forms\Components\TextInput::make('state'),

	            Forms\Components\Boolean::make('status'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Forms\Components\TextInput::make('first_name'),

	            Forms\Components\TextInput::make('last_name'),
                
	            Forms\Components\Radio::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female'
                    ]),

	            Forms\Components\TextInput::make('date_of_birth')
                    ->date(),

	            Forms\Components\TextInput::make('email')
                    ->email(),

	            Forms\Components\TextInput::make('street'),

	            Forms\Components\TextInput::make('city'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }    
}
