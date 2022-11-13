<?php

namespace App\Models;

use App\Traits\RecordActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory,RecordActivities;

    protected $guarded = [];

     public function favorited()
    {
        return $this->morphTo();
    }

}
