<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Mail\sendReplayAdminCommentToUser;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $comments = Comment::ParentComment()->Latestpaginate(20);
        return view("admin.comments.index", compact("comments"));
    }

    /**
     * Show the form for creating a new comment.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return \view("admin.comments.create");
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified comment.
     *
     * @param Comment $comment
     * @return void
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param Comment $comment
     * @return Application|Factory|View
     */
    public function edit(Comment $comment)
    {
        return \view("admin.comments.edit", compact("comment"));
    }

    /**
     * Update the specified comment in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $validData = $request->validate([
            "parent_id" => "required",
            "content" => "required",
            "status" => "required"
        ]);

        $comment->update($validData);

        return redirect()->route("admin.comments.index");
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return back();
    }

    /**
     * show the view for replay admin to comment
     * @param Comment $comment
     * @return Application|Factory|View
     */
    public function replay(Comment $comment)
    {
        return \view("admin.comments.replay",compact("comment"));
    }


    /**
     * Store a newly created replay comment in storage
     * @param Request $request
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function saveReplay(Request $request,Comment $comment): RedirectResponse
    {
        $validData = $request->validate([
            "parent_id" => "required",
            "content" => "required",
        ]);

        $comment->update(["status"=>TRUE]);

       Comment::create([
          "user_id" => User::where("role","admin")->first()->id,
          "content" => $validData["content"],
          "parent_id" => $validData["parent_id"],
          "status" => $validData["status"],
          "commentable_id" => $comment->commentable_id,
          "commentable_type" => $comment->commentable_type,

       ]);

       Notification::send([$comment->user],new \App\Notifications\sendReplayAdminCommentToUser($comment));

        return redirect()->route("admin.comments.index");
    }
}
