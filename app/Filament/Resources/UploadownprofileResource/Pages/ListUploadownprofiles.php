<?php

namespace App\Filament\Resources\UploadownprofileResource\Pages;

use App\Filament\Resources\UploadownprofileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUploadownprofiles extends ListRecords
{
    protected static string $resource = UploadownprofileResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
