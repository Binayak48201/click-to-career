<?php

namespace App\Traits;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Favoritable
{
    /**
     * @return MorphMany
     */
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function favorite()
    {
        if (!$this->favorites()->where('user_id', auth()->id())->exists()) {
            return $this->favorites()->create([
                'user_id' => auth()->id()
            ]);
        }

    }

    public function unfavorite()
    {
        $this->favorites()->where('user_id', auth()->id())->get()->each->delete();
    }

    /**
     * @return mixed
     */
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    /**
     * @return bool
     */
    public function isFavorited()
    {
        return !!$this->favorites->where('user_id', auth()->id())->count();
    }

    /**
     * @return bool
     */
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }
}
