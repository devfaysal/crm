<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class LeadDiversityByStatus extends ChartWidget
{
    protected static ?int $sort = 2;

    protected static ?string $heading = 'Lead Diversity by Status';

    protected function getData(): array
    {
        $status_diversity = DB::table('leads')
            ->join('statuses', 'statuses.id', '=', 'leads.status_id')
            ->select('status_id', 'statuses.name as status', 'statuses.color as color', DB::raw('count(*) as total'))
            ->groupBy('status_id')
            ->get();
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $status_diversity->pluck('total'),
                ],
            ],
            'labels' => $status_diversity->pluck('status'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
