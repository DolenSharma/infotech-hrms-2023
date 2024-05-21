<?php

namespace App\Filament\Resources\ConsultantResource\Pages;

use App\Filament\Resources\ConsultantResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewConsultant extends ViewRecord
{
    protected static string $resource = ConsultantResource::class;
    protected ?string $maxContentWidth = 'full';

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
