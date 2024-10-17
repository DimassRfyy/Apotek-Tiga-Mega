<?php

namespace App\Filament\Widgets;

use App\Models\category;
use App\Models\product;
use App\Models\productTransaction;
use App\Models\RecipeTransaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', category::count()),
            Stat::make('Total Product', product::count()),
            Stat::make('Product Transaction Success', ProductTransaction::where('is_paid', true)->count()),
            Stat::make('Recipe Transaction Success', RecipeTransaction::where('is_paid', true)->count()),
        ];
    }
}
