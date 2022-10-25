<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;

use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Post $post, Comment $comment) {

        $replyData = request()->validate([
            'reply' => 'nullable'
        ]);

        $replyData['post_id'] = $post->id;

        $replyData['comment_id'] = $comment->id;

        $replyData['user_id'] = auth()->id();

        $replyData['copy'] = request('copy');

        Reply::create($replyData);

        return back()->with('message', 'Your reply has been added!');
    }
}
