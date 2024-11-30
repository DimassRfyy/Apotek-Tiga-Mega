<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\ProductTransaction;
use App\Models\RecipeTransaction;

class TransactionChart extends ChartWidget
{
    protected static ?string $heading = 'Transaction Chart';
    protected static ?string $maxHeight = '35vh';

    protected function getData(): array
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $productTransactions = ProductTransaction::where('is_paid', true)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $recipeTransactions = RecipeTransaction::where('is_paid', true)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $productData = [];
        $recipeData = [];
        for ($i = 1; $i <= 12; $i++) {
            $productData[] = $productTransactions[$i] ?? 0;
            $recipeData[] = $recipeTransactions[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Product Transactions',
                    'data' => $productData,
                    'backgroundColor' => '#36A2EB',
                ],
                [
                    'label' => 'Recipe Transactions',
                    'data' => $recipeData,
                    'backgroundColor' => '#FF6384',
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
