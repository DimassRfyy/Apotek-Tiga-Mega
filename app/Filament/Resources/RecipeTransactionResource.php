<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipeTransactionResource\Pages;
use App\Filament\Resources\RecipeTransactionResource\RelationManagers;
use App\Models\RecipeTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecipeTransactionResource extends Resource
{
    protected static ?string $model = RecipeTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return (string) RecipeTransaction
        ::where('is_paid', false)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('trx_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('photo_recipe')
                    ->required()
                    ->openable()
                    ->image(),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_confirm')
                    ->required(),
                Forms\Components\Toggle::make('is_paid')
                    ->required(),
                Forms\Components\FileUpload::make('proof')
                    ->openable()
                    ->image()
                    ->default(null),
                    Forms\Components\TextInput::make('total_amount')
                    ->numeric()
                    ->prefix('IDR')
                    ->default(null),
                Forms\Components\Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('trx_id')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('photo_recipe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_confirm')
                    ->label('Sdh Cnfirm?')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_paid')
                    ->label('Sdh Byar?')
                        ->boolean(),
                Tables\Columns\ImageColumn::make('proof')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                ->prefix('Rp ')
                ->numeric()
                ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRecipeTransactions::route('/'),
            'create' => Pages\CreateRecipeTransaction::route('/create'),
            'edit' => Pages\EditRecipeTransaction::route('/{record}/edit'),
        ];
    }
}
