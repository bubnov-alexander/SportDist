<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkoutExerciseRelationManagerResource\RelationManagers\WorkoutExercisesRelationManager;
use App\Filament\Resources\WorkoutResource\Pages;
use App\Filament\Resources\WorkoutResource\RelationManagers;
use App\Models\Workout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkoutResource extends Resource
{
    protected static ?string $model = Workout::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Тренировки';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Тренировки';
    }

    protected static ?string $navigationGroup = 'Тренировки';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Пользователь')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->label('Название тренировки')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('Описание')
                    ->nullable(),

                Forms\Components\TextInput::make('duration')
                    ->label('Длительность (минут)')
                    ->numeric()
                    ->required(),

                Forms\Components\Toggle::make('is_completed')
                    ->label('Выполнено'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable()->label('Название'),
                Tables\Columns\TextColumn::make('user.name')->label('Пользователь'),
                Tables\Columns\TextColumn::make('duration')->label('Длительность (мин)')->sortable(),
                Tables\Columns\IconColumn::make('is_completed')
                    ->label('Выполнено')
                    ->boolean(),
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
            WorkoutExercisesRelationManager::make()
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkouts::route('/'),
            'create' => Pages\CreateWorkout::route('/create'),
            'edit' => Pages\EditWorkout::route('/{record}/edit'),
        ];
    }
}
