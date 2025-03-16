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
}
