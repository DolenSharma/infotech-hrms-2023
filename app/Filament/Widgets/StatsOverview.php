<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\SubmissionResource\Pages\ListSubmissions;
use App\Models\Consultant;
use App\Models\Interview;
use App\Models\Post;
use App\Models\Submission;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use PHPUnit\TextUI\XmlConfiguration\Constant;

class StatsOverview extends BaseWidget //Dummped for now , delete s and everything will be good.
{
    protected static ?string $maxHeight = '500px';
    protected static ?string $pollingInterval = '5s';
    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
    ];


    protected function getCards(): array
    {
        return [
           Card::make('Submissions',Submission::all()->count())
                ->description('Interview')
                ->description('Interviews: '.Interview::all()->count())
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Posts', Post::all()->count())
                  ->description('7% increase')
                  ->descriptionIcon('heroicon-s-trending-up')
                  ->color('success'),

            Card::make('Interviews', Interview::all()->count())
                  ->description('3% increase')
                  ->descriptionIcon('heroicon-s-trending-up')
                  ->color('success'),
            Card::make('Consultants', Consultant::all()->count())
                  ->description('increasing')
                  ->descriptionIcon('heroicon-s-trending-up')
                  ->chart([Post::all()->count()])
                  ->color('success'),

        ];
    }
}
