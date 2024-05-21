<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bdmpost extends Model
{
    use HasFactory;
    protected $fillable = [
        'bdmpost_id',
        'user_id',
        'consultant_id',
        'post_id',
        'interview_id',
        'submission_id',
        'dbm_current_user_name',
        'bdm_role',
        'visa_required',
        'bdm_postion',
        'bdm_state',
        'bdm_city',
        'max_rate',
        'bdm_status',
        'bdm_client',
        'bdm_submission',
        'implementation',
        'imp_email',
        'imp_contact',
        'pv_name',
        'pv_email',
        'pv_contact',
        'layer_name',
        'layer_email',
        'layer_contact',
        'layer_recruiter',
        'bdm_jd',
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

    public function layers()
{
    return $this->hasMany(Layer::class);
}

}