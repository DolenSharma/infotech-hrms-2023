<?php

namespace App\Observers;

use App\Models\Layer;

class LayerObserver
{
    public function saving(Layer $submission)
    {
        if ($submission->isDirty('layer_id') || !$submission->exists) {
            $existingSubmission = Layer::where('layer_id', $submission->layer_id)->first();

            if ($existingSubmission) {
                $submission->layer_id = $existingSubmission->layer_id;
            } else {
                $submission->layer_id = $this->generateLayerId($submission->name);
            }
        }
    }

    private function generateLayerId($name)
    {
        $serialNumber = Layer::max('id') + 1;
        return 'LAYER' . str_pad($serialNumber, 3, '0', STR_PAD_LEFT) . ' ' . strtoupper(str_replace(' ', '', $name));
    }
}
