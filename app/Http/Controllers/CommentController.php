<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Event;


class CommentController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Commentaire ajouté avec succès !');
    }
}
