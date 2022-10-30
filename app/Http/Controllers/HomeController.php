<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
//        $records = \DB::select(\DB::raw("select * from forums"));

          $forums = Forum::with('category')->latest()->paginate(10);

        return view('welcome', compact('forums'));
    }
}
