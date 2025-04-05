<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\Post\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'index';
        $posts = Post::all();

        return view('post::index', ['posts' => $posts, 'title' => $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'create post';
        $users = User::all();
        return view('post::create', ['title' => $pageTitle, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // get the data
        // $data = $_POST;

        // validation the data
        request()->validate([
            'title' => ['required', 'string', 'min:4', 'max:255'],
            'description' => ['required', 'string', 'min:4', 'max:255'],
            'user_id' => ['required', 'integer', 'exists:users,id']
        ]);

        // store data in database
        // case 1
//        $post = new Post();
//        $post->title = request()->title;
//        $post->description = request()->description;
//        $post->save();
        // case 2
        Post::create([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->user_id
        ]);

        // redirection to posts index
        return to_route('posts.index')->withSuccess('Post created successfully');
    }

    /**
     * Show the specified resource.
     */
    public function show(Post $post)
    {
        $pageTitle = 'show';

//        $post= Post::find($postId);
//        $post= Post::findOrFail($postId);
//        if(is_null($post)){
//            abort(404);
//        }

        return view('post::show', ['post' => $post, 'title' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $pageTitle = 'create post';
        $users = User::all();

        return view('post::edit', ['title' => $pageTitle, 'users' => $users, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post)
    {
        // get the data
        // $data = $_POST;
        $data = request()->all();

        // validation the data
        request()->validate([
            'title' => ['required', 'string', 'min:4', 'max:255'],
            'description' => ['required', 'string', 'min:4', 'max:255'],
            'user_id' => ['required', 'integer', 'exists:users,id']
        ]);
        // update data in database
        // case 1
//        $post->title = request()->title;
//        $post->description = request()->description;
//        $post->save();

        // case 2
        $post->update([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->user_id
        ]);

        // redirection to post show
        return to_route('posts.show', $post)->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(Post $post)
    {
        // Remove the post from the database
        $post->delete();
        // Redirect to the posts index
        return to_route('posts.index');
    }
}
