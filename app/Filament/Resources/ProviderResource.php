<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProviderResource\Pages;
use App\Filament\Resources\ProviderResource\RelationManagers;
use App\Models\Provider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProviderResource extends Resource
{
    protected static ?string $model = Provider::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
            Forms\Components\TextInput::make('contact')
                    ->label('Contacto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label('Teléfono')
                    ->prefix('+502')
                    ->required()
                    ->tel()
                    ->maxLength(20),
                Forms\Components\TextInput::make('address')
                    ->label('Dirección')
                    ->placeholder('Dirección del proveedor')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Nombre'),
                Tables\Columns\TextColumn::make('contact')
                    ->sortable()
                    ->searchable()
                    ->label('Contacto'),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->label('Correo Electrónico'),
                Tables\Columns\TextColumn::make('phone')
                    ->sortable()
                    ->searchable()
                    ->label('Teléfono'),
                Tables\Columns\TextColumn::make('address')
                    ->sortable()
                    ->searchable()
                    ->label('Dirección'),
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
            'index' => Pages\ListProviders::route('/'),
            'create' => Pages\CreateProvider::route('/create'),
            'edit' => Pages\EditProvider::route('/{record}/edit'),
        ];
    }
}
