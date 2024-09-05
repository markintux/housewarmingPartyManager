<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','number_of_guests','date','code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }

}
