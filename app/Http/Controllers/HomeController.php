<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $posts = Forum::all();

        return view('welcome',compact('posts'));
    }
}
