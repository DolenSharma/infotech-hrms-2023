<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
            'post_id',
            'title',
            'content',
            'user_id',
            'post_state',
            'post_city',
            'implementation',
            'imp_email',
            'imp_contact',
            'prime_vendor',
            'pv_email',
            'pv_contact',
            'end_client',
            'rate',
            'prime_rate',
            'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function referrals()
{
    return $this->hasMany(Referral::class);
}
public function uploadownprofiles()
{
    return $this->hasMany(Uploadownprofile::class);
}
public function submissions()
{
    return $this->hasMany(Submission::class);
}
public function interview()
{
    return $this->hasMany(Interview::class);
}

}
