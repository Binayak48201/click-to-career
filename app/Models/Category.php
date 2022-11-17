<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;

    protected $appends = ['path'];
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forum()
    {
        return $this->hasMany(Forum::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return "/posts/{$this->slug}";
    }
}
