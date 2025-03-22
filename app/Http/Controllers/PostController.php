<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    function index()
    {
        $pageTitle = 'index';
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts, 'title' => $pageTitle]);
    }

    function show(Post $post)
    {
        $pageTitle = 'show';

//        $post= Post::find($postId);
//        $post= Post::findOrFail($postId);
//        if(is_null($post)){
//            abort(404);
//        }

        return view('posts.show', ['post' => $post, 'title' => $pageTitle]);
    }

    function create()
    {
        $pageTitle = 'create post';
        $users = User::all();
        return view('posts.create', ['title' => $pageTitle, 'users' => $users]);
    }

    function store()
    {
        // get the data
        // $data = $_POST;

        // validation the data

        // store data in database
        // case 1
//        $post = new Post();
//        $post->title = request()->title;
//        $post->description = request()->description;
//        $post->save();
        // case 2
        Post::create([
            'title' => request()->title,
            'description' => request()->description
        ]);

        // redirection to posts index
        return to_route('posts.index');
    }


    function edit(Post $post)
    {
        $pageTitle = 'create post';
        $users = User::all();

        return view('posts.edit', ['title' => $pageTitle, 'users' => $users, 'post' => $post]);
    }

    function update(Post $post)
    {
        // get the data
        // $data = $_POST;
        $data = request()->all();

        // validation the data

        // update data in database
        // case 1
//        $post->title = request()->title;
//        $post->description = request()->description;
//        $post->save();

        // case 2
        $post->update([
            'title' => request()->title,
            'description' => request()->description
        ]);

        // redirection to post show
        return to_route('posts.show', $post);
    }

    function destroy()
    {
        // Remove the post from the database

        // Redirect to the posts index
        return to_route('posts.index');
    }
}
