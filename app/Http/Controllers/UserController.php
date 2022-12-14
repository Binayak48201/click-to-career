<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Forum;
use App\Models\Reply;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param $user
     * @return JsonResponse
     */
    public function index($user)
    {
        $user = User::with('forum.category')->where('name', $user)->firstOrFail();

        $reply = Reply::without('user')->with('forum.category')->where('user_id', $user->id)->latest()->paginate(10);

        $data = [
            'user' => $user,
            'replies' => $reply,
            'activities' => Activity::feed($user)
        ];
        return response()->json($data);
    }

    /**
     * @param  Request  $request
     * @param $user
     * @return JsonResponse
     */
    public function avatar(Request $request, $user)
    {
        request()->validate([
            'avatar' => 'required|image'
        ]);

        $user = User::where('name', $user)->firstOrFail();

        $fileName = time().'.'.$request->avatar->extension();

        $filepath = "/uploads/{$fileName}";

        $user->update([
            'avatar' => $filepath
        ]);

        $request->avatar->move(public_path('uploads'), $fileName);

        return response()->json($user);

//        return redirect()->back()->with('flash', 'Avatar updated successfully!!');
    }


    public function verifyUser()
    {
        if ($token = request('token')) {
            $user = User::where('remember_token', $token)->firstOrFail();

            $user->confirm();

            return redirect('/posts')->with('flash', 'Successfully confirmed your email addresss');
        }
    }
}
