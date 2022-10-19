<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    public function comments()
    {
        $comments = '';

        return view('posts.comment', [
            'comments' => $comments,
        ]);
    }
}
