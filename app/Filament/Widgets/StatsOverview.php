<?php

namespace App\Filament\Widgets;

use App\Models\company;
use App\Models\lead;
use App\Models\person;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('People', person::query()->count())
            ->description('Total People'),
            Stat::make('Companies', company::query()->count())
            ->description('Total Companies'),
            Stat::make('Leads', lead::query()->count())
            ->description('Total Leads'),
        ];
    }
}
