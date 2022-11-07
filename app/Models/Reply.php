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

    protected static function boot()
    {
        parent::boot();

        static::created(function ($reply) {
            $reply->forum->increment('replies_count');
        });

        static::deleted(function ($reply) {
            $reply->forum->decrement('replies_count');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

//    public function getUserAttribute()
//    {
//        $user = $this->user()->first();
//        return $user->name;
//    }
}
