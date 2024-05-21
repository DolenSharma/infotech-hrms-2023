<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadownprofile extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'uploadownprofile_id',
        'user_id',
        'own_prof_name',
        'email_id',
        'contact_number',
        'state',
        'city',
        'visa_status',
        'photo',
        'driving_license',
        'uploaded_cv',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
