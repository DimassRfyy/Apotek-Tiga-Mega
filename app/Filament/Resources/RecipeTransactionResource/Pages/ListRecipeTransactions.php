<?php

namespace App\Filament\Resources\RecipeTransactionResource\Pages;

use App\Filament\Resources\RecipeTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecipeTransactions extends ListRecords
{
    protected static string $resource = RecipeTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
