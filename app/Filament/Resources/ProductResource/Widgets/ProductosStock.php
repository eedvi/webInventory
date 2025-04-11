<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Movement;
use Illuminate\Support\Facades\DB;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Productos registrados', Product::count())
                ->description('Total en inventario')
                ->icon('heroicon-o-cube')
                ->color('primary'),
                
            Stat::make('Productos bajo stock mínimo', Product::whereColumn('current_stock', '<', 'minimum_stock')->count())
                ->description('Necesitan reabastecimiento')
                ->icon('heroicon-o-exclamation-triangle')
                ->color('danger'),
                
            Stat::make('Valor total del inventario', number_format(Product::sum(DB::raw('price * current_stock')), 2))
                ->description('Valor estimado')
                ->icon('heroicon-o-currency-dollar')
                ->color('success'),
                
            Stat::make('Movimientos recientes', Movement::whereDate('date', today())->count())
                ->description('Hoy')
                ->icon('heroicon-o-arrow-path')
                ->color('info'),
        ];
    }
    
    protected function getColumns(): int
    {
        return 2;
    }
}