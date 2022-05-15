<?php

namespace App\Http\Controllers\Frontend\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validData = $request->validated();

        auth()->user()->addComment($validData);

        msg("نظر شما با موفقیت ثبت و بععد از بررسی به نمایش گذاشته می شود.","success","ارسال شد");

        return back();
    }
}
