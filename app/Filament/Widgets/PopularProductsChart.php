<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\ProductTransaction;
use App\Models\Product;

class PopularProductsChart extends ChartWidget
{
    protected static ?string $heading = 'Popular Products';
    public function getDescription(): ?string
{
    return 'Top 10 Most Popular Product';
}
    protected static ?string $maxHeight = '35vh';

    protected function getData(): array
    {
        $popularProducts = ProductTransaction::where('is_paid', true)
            ->selectRaw('product_id, COUNT(*) as count')
            ->groupBy('product_id')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        $productIds = $popularProducts->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $data = $popularProducts->pluck('count')->toArray();
        $labels = $popularProducts->pluck('product_id')->map(function ($productId) use ($products) {
            return $products[$productId]->name ?? 'Unknown';
        })->toArray();

        $colors = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', 
            '#FF9F40', '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Popular Products',
                    'data' => $data,
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
