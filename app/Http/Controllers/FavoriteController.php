<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Reply;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Reply $reply)
    {
        return $reply->favorite();
    }

    public function destroy(Reply $reply)
    {
        $reply->unfavorite();
    }
}
