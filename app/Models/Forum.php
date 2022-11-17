<?php

namespace App\Models;

use App\Traits\RecordActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Forum extends Model
{
    use HasFactory,RecordActivities;

    protected $fillable = ['category_id', 'title', 'body', 'slug', 'user_id'];


    protected $appends = ['path'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($forum) {
            $forum->update(['slug' => $forum->title]);
        });
    }

    public function setSlugAttribute($value)
    {
        $slug = Str::slug($value); //maxime-vero-odio-dicta-accusamus-voluptatem-rem-consectetur

        if (static::whereSlug($slug)->exists()) {
            $slug = "{$slug}-{$this->id}";
        }

        $this->attributes['slug'] = $slug;
    }

    public function getAccessorAttribute()
    {
        return asset('index.php');
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function getPathAttribute()
    {
//        return "/posts/{$this->slug}";
        return "/posts/{$this->category->slug}/{$this->slug}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reply()
    {
        return $this->hasMany(Reply::class, 'forum_id');
    }


}
