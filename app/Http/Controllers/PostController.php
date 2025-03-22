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


    function edit()
    {
        $pageTitle = 'create post';

        return view('posts.edit', ['title' => $pageTitle]);
    }

    function update()
    {
        // get the data
        // $data = $_POST;
        $data = request()->all();
//            dd($data);
        // validation the data

        // store data in database

        // rediraction to post show
        return to_route('posts.show', 1);
    }

    function destroy()
    {
        // Remove the post from the database

        // Redirect to the posts index
        return to_route('posts.index');
    }
}
