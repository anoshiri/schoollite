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

    protected static ?string $pluralModelLabel = 'Students';
    protected static ?string $navigationLabel = 'Students';
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

                Forms\Components\TextInput::make('current_arm_id'),

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
                    ->directory('public/students')
                    ->helperText('Recommended size is 500px x 500px'),

                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('gender')
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('age')
                    ->date()
                    ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('birth_day')
                ->sortable()->searchable(),

                Tables\Columns\TextColumn::make('current_arm_id')
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
