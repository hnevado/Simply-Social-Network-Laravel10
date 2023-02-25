<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Comment;

class ReplyController extends Controller
{
    public function store(Request $request, Comment $comment)
    {

       
        $request->validate([
            'body' => 'required'
        ]);

        
        Reply::create([
            'user_id' => auth()->user()->id,
            'comment_id' => $comment->id,
            'body' => $request->body,
         ]);

        return back();
    }

}
