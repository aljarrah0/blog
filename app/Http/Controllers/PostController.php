<?php

namespace App\Http\Controllers;


use App\Models\Post;

class PostController extends Controller
{
    function index()
    {
        $pageTitle = 'index';
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts, 'title' => $pageTitle]);
    }

    function show($postId)
    {
        $pageTitle = 'show';
        $singlePost = ['id' => 1, 'title' => 'HTML', 'posted_by' => 'Mohammed', 'created_at' => '2025-01-011'];

        return view('posts.show', ['post' => $singlePost, 'title' => $pageTitle]);
    }

    function create()
    {
        $pageTitle = 'create post';

        return view('posts.create', ['title' => $pageTitle]);
    }

    function store()
    {
        // get the data
        // $data = $_POST;
         $data = request()->all();
        // validation the data

        // store data in database

        // rediraction to posts index
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
