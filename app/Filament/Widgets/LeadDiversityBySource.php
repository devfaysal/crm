<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class LeadDiversityBySource extends ChartWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'Lead Diversity by Source';

    protected function getData(): array
    {
        $source_diversity = DB::table('leads')
            ->select('source', DB::raw('count(*) as total'))
            ->groupBy('source')
            ->get();
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $source_diversity->pluck('total'),
                ],
            ],
            'labels' => $source_diversity->pluck('source'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
