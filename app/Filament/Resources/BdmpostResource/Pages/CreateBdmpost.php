<?php

namespace App\Filament\Resources\BdmpostResource\Pages;

use App\Filament\Resources\BdmpostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBdmpost extends CreateRecord
{
    protected static string $resource = BdmpostResource::class;
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Post Created Successfully';
    }
}
