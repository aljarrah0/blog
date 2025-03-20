<?php

namespace App\Http\Controllers;


class PostController extends Controller
{
    function index()
    {
        $pageTitle = 'index';
        $posts = [
            ['id' => 1, 'title' => 'HTML', 'posted_by' => 'Mohammed', 'created_at' => '2025-01-011'],
            ['id' => 1, 'title' => 'CSS', 'posted_by' => 'Ahmed', 'created_at' => '2025-01-10'],
            ['id' => 1, 'title' => 'JS', 'posted_by' => 'Amjad', 'created_at' => '2025-01-09'],
            ['id' => 1, 'title' => 'PHP', 'posted_by' => 'Yasin', 'created_at' => '2025-01-01'],
        ];
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
