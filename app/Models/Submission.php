<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Submission extends Model
{
    use HasFactory,HasRoles;
    protected $fillable = [
    'submission_id',
    'sub_name',
    'profile_given_by',
    'user_id',
    'consultant_id',
    'post_id',
    'state',
    'city',
    'sub_basis',
    'rate',
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

    public function interviews(){
        return $this->hasMany(Interview::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
