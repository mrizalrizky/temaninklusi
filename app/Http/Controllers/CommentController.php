<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserCommentReplies;
use App\Models\UserComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request) {
        UserComment::create([
            'content'  => $request->content,
            'event_id' => $request->event_id,
            'user_id'  => Auth::user()->id,
        ]);

        return redirect()->back()->with('section', 'comment');
    }

    public function replyComment(Request $request) {
        UserCommentReplies::create([
            'content'         => $request->content,
            'user_comment_id' => $request->user_comment_id,
            'user_id'         => Auth::user()->id
        ]);

        return redirect()->back()->with('section', 'comment');
    }

    public function deleteComment($id) {
        // $userComment = UserComment::with('replies')->findOrFail($id);
        $userComment = UserComment::findOrFail($id);

        if($userComment->replies) {
            foreach($userComment->replies as $reply) {
                $reply->delete();
            }
        }

        $userComment->delete();
        return redirect()->back()->with(
            'action-success', 'Komentar berhasil dihapus!'
        )->with('section', 'comment');
    }

    public function deleteCommentReply ($id) {
        $userCommentReply = UserCommentReplies::findOrFail($id);
        $userCommentReply->delete();

        return redirect()->back()->with(
            'action-success', 'Komentar berhasil dihapus!'
        )->with('section', 'comment');
    }
}
