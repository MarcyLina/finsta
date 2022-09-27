<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $header = 'hello this is all posts';
        return view('posts.index', [
            'header' => $header,
        ]);
    }

    public function show()
    {
        $header = 'hello this is a single post';
        return view('posts.show', [
            'header' => $header,
        ]);
    }
}
