<?php

namespace App\Filament\Widgets;
use App\Models\ContactEnquiry;
use App\Models\Page;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            // Programs Stats
            Stat::make('Active Programs', Program::where('status', 'active')->count())
                ->description('Total published')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 3, 10, 8, 15, 12, 18]),

            Stat::make('Categories', ProgramCategory::where('status', 'active')->count())
                ->description('Active categories')
                ->descriptionIcon('heroicon-m-folder')
                ->color('info'),

            Grid::make(2)
            ->schema([
                Stat::make('Total Programs', Program::count())
                    ->description('All programs')
                    //->descriptionIcon('DocumentText')
                    ->color('primary'),

                Stat::make('Inactive Programs', Program::where('status', 'inactive')->count())
                    ->description('Drafts/Archived')
                    ->descriptionIcon('heroicon-m-archive-box-x-mark')
                    ->color('danger'),

                 Stat::make('Active Pages', Page::where('status', 'active')->count())
                ->description('Website pages')
                ->descriptionIcon('heroicon-m-document')
                ->color('primary'),

                Stat::make('Total Users', User::count())
                ->description('Admin panel users')
                ->descriptionIcon('heroicon-m-users')
                ->color('gray'),

            ]),

            // Enquiries Stats

        ];
    }
}
