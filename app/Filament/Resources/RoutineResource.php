<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoutineResource\Pages;
use App\Filament\Resources\RoutineResource\RelationManagers;
use App\Models\Routine;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoutineResource extends Resource
{
    protected static ?string $model = Routine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Распорядок';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Распорядок';
    }

    protected static ?string $navigationGroup = 'Тренировки';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->label('Пользователь')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Название'),
                Forms\Components\Textarea::make('description')
                    ->label('Описание')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Пользователь'),
                Tables\Columns\TextColumn::make('title')->label('Название'),
                Tables\Columns\TextColumn::make('description')->limit(50)->label('Описание'),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d.m.Y H:i'),
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
            'index' => Pages\ListRoutines::route('/'),
            'create' => Pages\CreateRoutine::route('/create'),
            'edit' => Pages\EditRoutine::route('/{record}/edit'),
        ];
    }
}
