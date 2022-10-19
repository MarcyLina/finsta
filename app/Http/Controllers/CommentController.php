<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $commentData = request()->validate([
            'copy' => 'required'
        ]);

        $commentData['post_id'] = $post->id;

        $commentData['user_id'] = auth()->id();

        $commentData['copy'] = request('copy');

        Comment::create($commentData);

        return back()->with('message', 'Your post has been added!');
    }
}
