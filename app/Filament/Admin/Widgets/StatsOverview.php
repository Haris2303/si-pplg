<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Article;
use App\Models\Subject;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Artikel/Berita', Article::count())
                ->description('Artikel yang diterbitkan')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Total Guru', Teacher::count())
                ->description('Tenaga Pengajar Aktif')
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->chart([3, 5, 3, 7, 8]),

            Stat::make('Kurikulum', Subject::count())
                ->description('Mata Pelajaran')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('warning'),
        ];
    }
}
