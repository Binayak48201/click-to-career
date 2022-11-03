<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($user)
    {
        $user = User::where('name', $user)->firstOrFail();

        return view('profile.index', compact('user'));
    }

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


        return redirect()->back()->with('flash', 'Avatar updated successfully!!');
    }
}
