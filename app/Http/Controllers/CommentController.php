<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Ad $ad)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->ad_id = $ad->id;
        $comment->rating = $validatedData['rating'];
        $comment->comment = $validatedData['comment'];
        $comment->save();

        return redirect()->route('ads.show', $ad->id);
    }
}
