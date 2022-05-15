<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Jorenvh\Share\Share;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::Latestpaginate(9);

        if ($request->has("tag") && !empty($request->get("tag"))){
            $blogs = $this->getBlogsTag();
        }

        if ($request->has("category") && !empty($request->get("category"))){
            $blogs = $this->getBlogsCategory();
        }

        return view("frontend.blogs.blog",compact("blogs"));
    }

    public function show(Blog $blog)
    {
       $share = new Share();
       $share->page('http://jorenvanhocht.be', 'Share title')
        ->facebook()
        ->twitter()
        ->linkedin('Extra linkedin summary can be passed here')
        ->whatsapp()
        ->getRawLinks();

        $comments = $blog->comments()->published()->latest()->get();
        $suggested_blogs = Blog::getRandomArticles($blog);

        return view("frontend.blogs.single-blog",
            compact("suggested_blogs","blog","comments","share"));
    }

    public function getBlogsTag()
    {
        $blogs = Blog::GetBlogsTagThatUserSearchFor()
        ->latestpaginate(12);

        return $blogs;
    }

    public function getBlogsCategory()
    {
        $blogs = Blog::GetBlogsCategoryThatUserSearchFor()
            ->latestpaginate(12);

        return $blogs;
    }

}
