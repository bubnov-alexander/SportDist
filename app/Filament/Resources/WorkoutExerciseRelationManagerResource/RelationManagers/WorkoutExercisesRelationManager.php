<?php

namespace App\Filament\Resources\WorkoutExerciseRelationManagerResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkoutExercisesRelationManager extends RelationManager
{
    protected static string $relationship = 'WorkoutExercises';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('exercise_id')
                    ->label('Упражнение')
                    ->relationship('exercise', 'name')
                    ->required(),

                Forms\Components\TextInput::make('sets')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('reps')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(1),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('exercise.name')->label('Упражнение'),
                Tables\Columns\TextColumn::make('sets'),
                Tables\Columns\TextColumn::make('reps'),
                Tables\Columns\TextColumn::make('order'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
