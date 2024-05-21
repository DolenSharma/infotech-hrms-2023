<?php

namespace App\Filament\Resources\BdmpostResource\Pages;

use App\Filament\Resources\BdmpostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBdmpost extends EditRecord
{
    protected static string $resource = BdmpostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Post Updated Successfully!!';
    }
}
