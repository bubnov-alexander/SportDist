<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgressResource\Pages;
use App\Filament\Resources\ProgressResource\RelationManagers;
use App\Models\Progress;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgressResource extends Resource
{
    protected static ?string $model = Progress::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Прогресс';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Прогресс';
    }

    protected static ?string $navigationGroup = 'Тренировки';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Пользователь')
                    ->required(),
                Forms\Components\Select::make('workout_id')
                    ->relationship('workout', 'title')
                    ->label('Тренировка')
                    ->required(),
                Forms\Components\DateTimePicker::make('performed_at')
                    ->label('Выполнено')
                    ->required(),
                Forms\Components\TextInput::make('duration')
                    ->numeric()
                    ->label('Повторений')
                    ->required(),
                Forms\Components\TextInput::make('calories_burned')
                    ->numeric()
                    ->label('Каллорий')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Пользователь'),
                Tables\Columns\TextColumn::make('workout.title')->label('Тренировка'),
                Tables\Columns\TextColumn::make('duration')->label('Длительность'),
                Tables\Columns\TextColumn::make('calories_burned')->label('Ккал'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProgress::route('/'),
            'create' => Pages\CreateProgress::route('/create'),
            'edit' => Pages\EditProgress::route('/{record}/edit'),
        ];
    }
}
