<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExerciseResource\Pages;
use App\Filament\Resources\ExerciseResource\RelationManagers;
use App\Models\Exercise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExerciseResource extends Resource
{
    protected static ?string $model = Exercise::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Упражнения';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Упражнения';
    }

    protected static ?string $navigationGroup = 'Тренировки';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Название тренировки')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('Описание тренировки')
                    ->nullable(),

                Forms\Components\TextInput::make('muscle_group')
                    ->label('Группа мышц')
                    ->nullable()
                    ->maxLength(255),

                Forms\Components\TextInput::make('equipment')
                    ->label('Оборудование')
                    ->nullable()
                    ->maxLength(255),

                Forms\Components\TextInput::make('duration_minutes')
                    ->label('Длительность (минуты)')
                    ->numeric()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Название'),
                Tables\Columns\TextColumn::make('muscle_group')->sortable()->label('Группа мышц'),
                Tables\Columns\TextColumn::make('equipment')->sortable()->label('Оборудование'),
                Tables\Columns\TextColumn::make('duration_minutes')->label('Длительность (мин)')->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListExercises::route('/'),
            'create' => Pages\CreateExercise::route('/create'),
            'edit' => Pages\EditExercise::route('/{record}/edit'),
        ];
    }
}
