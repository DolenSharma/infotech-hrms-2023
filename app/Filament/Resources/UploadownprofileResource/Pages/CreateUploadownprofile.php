<?php

namespace App\Filament\Resources\UploadownprofileResource\Pages;

use App\Filament\Resources\UploadownprofileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUploadownprofile extends CreateRecord
{
    protected static string $resource = UploadownprofileResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
{
    return 'Profile successfully uploaded.';
}
}
