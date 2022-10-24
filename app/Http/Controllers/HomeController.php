<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Forum::with('category')->latest()->paginate(10);

        return view('welcome', compact('posts'));
    }
}
