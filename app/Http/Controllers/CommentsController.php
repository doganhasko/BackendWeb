<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required',
        ]);
    
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
            'body' => $request->input('body'),
        ]);
    
        return redirect()->back();
    }}
