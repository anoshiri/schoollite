<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $pluralModelLabel = 'Teachers';
    protected static ?string $navigationLabel = 'Teachers';
    protected static ?string $navigationGroup = 'Profiles';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('gender')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('date_of_birth'),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('street')
                    ->maxLength(255),

                Forms\Components\TextInput::make('city')
                    ->maxLength(255),

                Forms\Components\TextInput::make('state')
                    ->maxLength(255),

                Forms\Components\FileUpload::make('photos')
                    ->image()
                    ->multiple()
                    ->enableReordering()
                    ->imageCropAspectRatio('1:1')
                    ->maxSize(512)
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('500')
                    ->imageResizeTargetHeight('500')
                    ->disk('local')
                    ->directory('public/teachers')
                    ->helperText('Recommended size is 500px x 500px'),

                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullName'),

	            Tables\Columns\TextColumn::make('birth_day'),

                Tables\Columns\TextColumn::make('age'),

	            Tables\Columns\TextColumn::make('email'),
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
            RelationManagers\ArmsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }    
}
