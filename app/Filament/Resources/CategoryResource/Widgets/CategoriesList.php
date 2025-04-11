<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class CategoriesList extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $categories = Category::withCount('products')->get();
        
        return $categories->map(function ($category) {
            return [
                'name' => $category->name,
                'value' => $category->products_count,
                'description' => $category->description
            ];
        })->toArray();
    }

    protected function getType(): string
    {
        return 'bubble';
    }
}
