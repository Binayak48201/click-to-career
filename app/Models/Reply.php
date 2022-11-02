<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['user'];

//    protected $appends = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function getUserAttribute()
//    {
//        $user = $this->user()->first();
//        return $user->name;
//    }
}
