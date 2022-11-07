<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * @param  Forum  $forum
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Forum $forum)
    {
        request()->validate([
            'body' => ["required", 'min:10', 'string']
        ]);
//          OPTIONAL
//        $forum->reply()->create([
//            'user_id' => auth()->id(),
//            'body' => request('body')
//        ]);

        Reply::create([
            'user_id' => auth()->id(),
            'forum_id' => $forum->id,
            'body' => request('body')
        ]);

        return redirect()->back()->with('flash', 'Reply created!!');
    }
}
