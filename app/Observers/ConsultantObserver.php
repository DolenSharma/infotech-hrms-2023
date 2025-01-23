<?php

namespace App\Observers;

use App\Models\Consultant;
use Illuminate\Support\Facades\Storage;

class ConsultantObserver
{

    public function saving(Consultant $consultant)
    {

        if ($consultant->isDirty('consultant_name') || !$consultant->exists) {
            $existingSubmission = Consultant::where('consultant_name', $consultant->consultant_name)->first();

            if ($existingSubmission) {
                $consultant->consultant_id = $existingSubmission->consultant_id;
            } else {
                $consultant->consultant_id = $this->generateLayerId($consultant->name);
            }
        }
    }

    private function generateLayerId($name)
    {
        $serialNumber = Consultant::max('id') + 1;
        return 'CON' . str_pad($serialNumber, 3, '0', STR_PAD_LEFT) . ' ' . strtoupper(str_replace(' ', '', $name));
    }
    public function saved(Consultant $consultant): void
    {
        if ($consultant->isDirty('con_cv')) {
            Storage::disk('public')->delete($consultant->getOriginal('con_cv'));
        }
        if ($consultant->isDirty('image')) {
            Storage::disk('public')->delete($consultant->getOriginal('image'));
        }
    }
 
    public function deleted(Consultant $consultant): void
    {
        if (! is_null($consultant->con_cv)) {
            Storage::disk('public')->delete($consultant->con_cv);
        }
        if (! is_null($consultant->image)) {
            Storage::disk('public')->delete($consultant->image);
        }
    }
}
