<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function Comment(CommentRequest $req, $post_id)
    {
        if (Auth::guard('web')->check()) {
            Comment::insert([
                'user_id' => Auth::guard('web')->id(),
                'post_id' => $post_id,
                'comment' => $req->Text,
                'created_at' => date('y-m-d h:i:s'),
            ]);
            $comment = Comment::where([
                'user_id' => Auth::guard('web')->id(),
                'post_id' => $post_id,
                'comment' => $req->Text,
                'created_at' => date('y-m-d h:i:s'),
            ])->get()->first();
            $id = $comment->id;
            return response()->json(['id' => $comment->id, 'date' => $comment->created_at]);
        } else {
            return 'false';
        }
    }

    public function deletecomment(Request $req)
    {
        Comment::where('id', $req->commentid)->delete();
        return $req->commentid;
    }

    public function Admindeletecomment($id)
    {
        Comment::where('id', $id)->delete();
        return redirect(url('/Admins/Comments'));
    }

    public function updatecomment(Request $req, $commentid)
    {
        Comment::where('id', '=', $commentid)->update([
            'comment' => $req->newcomment
        ]);
        return $commentid;
    }

    public function comments()
    {
        $comments = Comment::paginate(10);
        return view('Admins.Comments', compact('comments'));
    }
}
