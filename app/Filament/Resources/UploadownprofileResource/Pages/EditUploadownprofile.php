<?php

namespace App\Filament\Resources\UploadownprofileResource\Pages;

use App\Filament\Resources\UploadownprofileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUploadownprofile extends EditRecord
{
    protected static string $resource = UploadownprofileResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotificationTitle(): ?string
{
    return 'Profile Updated Successfully!!';
}

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
