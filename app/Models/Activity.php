<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function subject()
    {
        return $this->morphTo();
    }


    public static function feed($user)
    {
        return static::with('subject')
            ->where('user_id', $user->id)
            ->latest()
            ->take(50)
            ->get()
            ->groupBy(function ($activity) {
                return $activity->created_at->format('Y-m-d');
            });
    }
}
