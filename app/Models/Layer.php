<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'candidate_name',
        'layer_id',
        'layer_rate',
        'layer_basis',
        'consultant_id',
        'bdmpost_id',
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

    
    public function bdmpost()
    {
        return $this->belongsTo(Bdmpost::class);
    }
}
