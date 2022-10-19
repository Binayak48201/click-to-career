<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Forum::with('category')->get();

        return view('welcome', compact('posts'));
    }
}
