<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Consultant extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'consultant_id',
        'consultant_name',
        'profile_given_by',
        'con_contact_number',
        'con_email',
        'experience',
        'state',
        'city',
        'visa',
        'dob',
        'linkedin',
        'education',
        'catagory',
        'status',
        'image',
        'user_id',
        'con_cv',
        'company_name',
        'comp_email',
        'recruiter_name',
        'phone_number',
        'bench_rate',
        'extension',
        'is_verified', 
    ];



    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
    public function interviews()
{
    return $this->hasMany(Interview::class);
}

}
