<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = [
        'interview_id',
        'layer_id',
        'submission_id',
        'user_id',
        'interview_date',
        'rounds_of_interview',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function layer()
    {
        return $this->belongsTo(Layer::class);
    }

}
