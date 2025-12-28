<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Program;

class ProgramsChart extends ChartWidget
{
    protected ?string $heading = 'Programs by Status';
    protected int | string | array $columnSpan = 1;
    protected static ?int $sort =2;


    protected function getData(): array
    {
        $data = Program::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Programs',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        'rgb(34 197 94 / 0.7)',  // Active green
                        'rgb(239 68 68 / 0.7)',  // Inactive red
                    ],
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
