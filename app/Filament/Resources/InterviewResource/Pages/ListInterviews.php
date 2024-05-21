<?php

namespace App\Filament\Resources\InterviewResource\Pages;

use App\Filament\Resources\InterviewResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInterviews extends ListRecords
{
    protected static string $resource = InterviewResource::class;
    protected ?string $maxContentWidth = 'full';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
