<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Reply;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Reply $reply)
    {
        if ($reply->favorite()) {
            return redirect()->back()->with('flash', 'Favorited Reply!!!');
        } else {
            return redirect()->back()->with('flash', 'Already Favorited');
        }
    }

    public function destroy(Reply $reply)
    {
        $reply->unfavorite();
        return redirect()->back()->with('flash', 'Unfavorited Reply!@!@');

    }
}
