<?php

namespace App\Filament\Resources\SubmissionResource\Pages;

use App\Filament\Resources\SubmissionResource;
use App\Models\Submission;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;

class ViewSubmission extends ViewRecord
{
    protected static string $resource = SubmissionResource::class;
    protected ?string $maxContentWidth = 'full';

    protected function getActions(): array
    {

            return [
                Actions\ViewAction::make(),
                Actions\EditAction::make(),
            ];

        //     $user = Auth::user();
        //    if( $submission = Submission::where('user_id', $user->id)->orderBy('id', 'desc')->get()){
        //         return true;
        //    }return false;
    }

}
