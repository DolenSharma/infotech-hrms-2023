<?php

namespace App\Filament\Resources\BdmpostResource\Pages;

use App\Filament\Resources\BdmpostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBdmposts extends ListRecords
{
    protected static string $resource = BdmpostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
