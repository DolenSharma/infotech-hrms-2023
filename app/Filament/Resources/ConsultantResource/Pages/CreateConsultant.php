<?php

namespace App\Filament\Resources\ConsultantResource\Pages;

use App\Filament\Resources\ConsultantResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateConsultant extends CreateRecord
{
    protected static string $resource = ConsultantResource::class;
    protected ?string $maxContentWidth = 'full';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
{
    return 'Consultant Created Successfully';
}
}
