<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use App\Models\Source;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Leads', Lead::count()),
            Stat::make('Sources', Source::count()),
            Stat::make('Order Confirmed', Lead::where('status_id', 1)->count()),
            Stat::make('Order Completed', Lead::where('status_id', 5)->count()),
        ];
    }
}
