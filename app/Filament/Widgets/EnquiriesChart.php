<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\ContactEnquiry;
use Illuminate\Support\Facades\DB;
class EnquiriesChart extends ChartWidget
{
    protected ?string $heading = 'Enquiries Over Time';
    protected int | string | array $columnSpan = 1;
    protected static ?int $sort = 3;
    protected int | string | array $rowSpan = 1;

    protected function getFilters(): ?array
    {
        return [
            '7d' => '7 Days',
            '30d' => '30 Days',
            '90d' => '90 Days',
        ];
    }

    protected function getData(): array
    {
         $period = $this->getFilters() ?? '7d';
        $days = match($period) {
            '7d' => 7,
            '30d' => 30,
            '90d' => 90,
            default => 7
        };

        $data = ContactEnquiry::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date')
            ->map(fn ($count) => (int) $count);

        return [
            'datasets' => [
                [
                    'label' => 'New Enquiries',
                    'data' => $data->values(),
                    'backgroundColor' => 'rgb(99 102 241 / 0.5)',
                    'borderColor' => 'rgb(99 102 241)',
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
