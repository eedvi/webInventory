<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovementResource\Pages;
use App\Filament\Resources\MovementResource\RelationManagers;
use App\Models\Movement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovementResource extends Resource
{
    protected static ?string $model = Movement::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-up-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            Forms\Components\Select::make('product_id')
                ->label('Producto')
                ->relationship('product', 'name')
                ->searchable()
                ->required(),
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
            Forms\Components\Select::make('type')
                ->options([
                    'entrada' => 'Entrada',
                    'salida' => 'Salida',
                ])
                ->required(),
            Forms\Components\TextInput::make('quantity')
                ->label('Cantidad')
                ->numeric()
                ->required()
                ->minValue(1)
                ->maxValue(1000000)
                ->placeholder('Cantidad'),
            Forms\Components\RichEditor::make('description')
                ->label('Descripción')
                ->required()
                ->maxLength(1000)
                ->placeholder('Descripción del movimiento'),
            Forms\Components\DatePicker::make('date')
                ->label('Fecha')
                ->required()
                ->default(now())
                ->placeholder('Selecciona una fecha')
                ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Producto')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuario que realizó el movimiento')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo de movimiento')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Cantidad')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Fecha del movimiento')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListMovements::route('/'),
            'create' => Pages\CreateMovement::route('/create'),
            'edit' => Pages\EditMovement::route('/{record}/edit'),
        ];
    }
}
