<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Reply;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * @param  Forum  $forum
     * @return JsonResponse
     */
    public function store(Forum $forum)
    {
        request()->validate([
            'body' => ["required", 'min:10', 'string']
        ]);

        $reply = Reply::create([
            'user_id' => auth()->id(),
            'forum_id' => $forum->id,
            'body' => request('body')
        ]);

        $reply->load('user');

        return response()->json($reply);
    }
}
