<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forum;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Category  $category
     */
    public function index(Category $category)
    {
        $latestForums = Forum::latest();

        if ($category->exists) {
            $latestForums->where('category_id', $category->id);
        }

        $forums = $latestForums->with('category')->paginate(10);

        return view('welcome', compact('forums'));
    }

//    private function getLatestPosts($category = '')
//    {
//        if ($category) {
//            $category = Category::whereSlug($category)->first();
//            $forum = Forum::where('category_id', $category->id)->latest();
//        } else {
//            $forum = Forum::latest();
//        }
//
//        return $forum->with('category')->paginate(10);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);

        return view("posts.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        request()->validate([
            "category_id" => "required|numeric",
            "title" => "required",
            "body" => "required",
        ]);

        $forum = Forum::create([
            "user_id" => auth()->id(),
            "category_id" => $request->category_id,
            "title" => $request->title,
            "body" => $request->body,
//            "slug" => Str::slug($request->title)
        ]);

        return redirect($forum->path())->with('flash', "Successfully created record!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @param  \App\Models\Forum  $forum
     * @return Application|Factory|View
     */
    public function show($category, Forum $forum)
    {
//        return Forum::where('id','=',$id)->first();
//       return  $post = Forum::with('category')->where('id', '=', $id)->firstOrFail();
//        return $post = Forum::with('category')->whereId($id)->firstOrFail();
//         return  $post = Forum::with('category','reply')->where('id', $forum)->firstOrFail();
        return view('posts.show', [
            'post' => $forum->load(['category', 'reply'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category, Forum $forum)
    {
        $forum->delete();

        return redirect()->back()->with('flash', "Successfully deleted record!!");
    }
}
