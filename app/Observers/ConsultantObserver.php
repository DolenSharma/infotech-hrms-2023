<?php

namespace App\Observers;

use App\Models\Consultant;

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
}
