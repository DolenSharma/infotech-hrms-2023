<?php

namespace App\Filament\Resources\SubmissionResource\Pages;

use App\Filament\Resources\SubmissionResource;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions;

class Settings extends Page
{
    protected static string $resource = SubmissionResource::class;

    protected static string $view = 'filament.resources.submission-resource.pages.settings';

    protected function getActions(): array
    {

            return [
                Actions\ViewAction::make(),
            ];
        }

}
