<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
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
        $latestForums = Forum::query();

        if ($category->exists) {
            $latestForums->latest()->where('category_id', $category->id);
        }

        if ($search = request('search')) {
            $latestForums->latest()->where('title', 'like', '%'.$search.'%');
        } elseif ($username = request('by')) {
            $user = User::where('name', $username)->firstOrfail();
            $latestForums->latest()->where('user_id', $user->id);
        } elseif (request('popular')) {
            $latestForums->orderBy('replies_count', 'desc');
        }

        $forums = $latestForums->with('category', 'user')->paginate(10);

        return response()->json($forums);

    }

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
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateIncomingRecords();

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
     * @param  Forum  $forum
     * @return JsonResponse
     */
    public function show(Category $category, Forum $forum)
    {
        $forum->increment('visits');

        $data = [
            'forum' => $forum->load('category','user'),
            'replies' => $forum->reply()->latest()->paginate(10)
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Forum  $forum
     * @return Application|Factory|View
     */
    public function edit(Forum $forum)
    {
        $this->authorize('update', $forum);
//        abort_if($forum->user_id != auth()->id(),403);
//        if ($forum->user_id != auth()->id()) {
//            abort('403');
//        }

        return view('posts.edit', compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Forum  $forum
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Forum $forum)
    {
        $this->authorize('update', $forum);

        $this->validateIncomingRecords();

        $forum->update([
            "category_id" => $request->category_id,
            "title" => $request->title,
            "body" => $request->body
        ]);

        return redirect($forum->path())->with('flash', "Successfully updated record!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Forum  $forum
     * @return RedirectResponse
     */
    public function destroy(Category $category, Forum $forum)
    {
        $this->authorize('delete', $forum);

        $forum->delete();

        return redirect()->back()->with('flash', "Successfully deleted record!!");
    }

    private function validateIncomingRecords()
    {
        request()->validate([
            "category_id" => "required|numeric",
            "title" => "required",
            "body" => "required",
        ]);
    }
}
