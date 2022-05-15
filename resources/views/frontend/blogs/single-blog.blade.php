<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="HTML5,CSS3,HTML,Template,Multipurpose,Online Banking,Payment Processing,Luvion - Online Banking & Payment Processing HTML Template" >
        <meta name="description" content="Luvion - Online Banking & Payment Processing HTML Template">
        <meta name="author" content="Barat Hadian">

        @include("layouts.header_link")
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <title>Luvion - قالب HTML لوویون , پوسته چندمنظوره شرکتی بانکداری آنلاین و پردازش پرداخت</title>

        <link rel="icon" type="image/png" href="{{asset("assets/img/favicon.png")}}">
        @livewireStyles

    </head>

{{--        <!-- Preloader -->--}}
{{--        <div class="preloader">--}}
{{--            <div class="loader">--}}
{{--                <div class="shadow"></div>--}}
{{--                <div class="box"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End Preloader -->--}}

        @include("layouts.header")

        <!-- Start Page Title Area -->
        <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
            <div class="container">
                <div class="page-title-content">
                    <h2>وبلاگ</h2>
                    <p>آخرین اخبار ما</p>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Blog Details Area -->
        <section class="blog-details-area ptb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="blog-details">
                            <div class="article-image">
                                <img src="{{asset('assets/blogs/'.$blog->image)}}" alt="image">
                            </div>

                            <div class="article-content">
                                <div class="entry-meta">
                                    <ul>
                                        <li><span>منتشر شده :</span> <a href="#">{{\Morilog\Jalali\Jalalian::forge($blog->created_at)->ago()}}</a></li>
                                        <li><span>ارسال شده توسط:</span> <a href="#">{{$blog->user->name}}</a></li>
                                    </ul>
                                </div>
                                {!! $blog->content !!}
                            </div>

                            <div class="article-footer">
                                <div class="article-tags d-flex">
                                    @livewire("bookmark",["blog"=>$blog])
                                    <a href="#">مد</a>,
                                    <a href="#">بازی ها</a>,
                                    <a href="#">سفر</a>
                                </div>

                                <div class="article-share">
                                    <ul class="social">
                                        {!!$share!!}
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="comments-area">
                            <h3 class="comments-title">{{$blog->comments()->where('status',1)->count()}} نظرات:</h3>

                            <ol class="comment-list">
                                @if($comments->count())
                                    @foreach($comments as $comment)
                                    <li class="comment">
                                        <article class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="{{asset('assets/users/'.$comment->user->profile_image)}}" class="avatar" alt="image">
                                                    <b class="fn">{{$comment->user->name}}</b>
                                                    <span class="says">می گوید:</span>
                                                </div>

                                                <div class="comment-metadata">
                                                    <a href="#">
                                                        <time>{{$comment->created_at}}</time>
                                                    </a>
                                                </div>
                                            </footer>

                                            <div class="comment-content">
                                                <p>{{$comment->content}}</p>
                                            </div>
                                        </article>

                                        <ol class="children">
                                            @foreach($comment->childs as $commentChild)
                                                <li class="comment">
                                                    <article class="comment-body">
                                                        <footer class="comment-meta">
                                                            <div class="comment-author vcard">
                                                                <img src="{{asset('assets/users/'.$commentChild->user->profile_image)}}" class="avatar" alt="image">
                                                                <b class="fn">{{$commentChild->user->name}}</b>
                                                                <span class="says">می گوید:</span>
                                                            </div>

                                                            <div class="comment-metadata">
                                                                <a href="#">
                                                                    <time>{{$commentChild->created_at}}</time>
                                                                </a>
                                                            </div>
                                                        </footer>

                                                        <div class="comment-content">
                                                            <p>{{$commentChild->content}}</p>
                                                        </div>
                                                    </article>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </li>
                                    @endforeach
                                   @else
                                    <li class="comment">
                                        <p class="alert alert-warning">کامنتی برای این پست ثبت نشده است!</p>
                                    </li>
                                @endif
                            </ol>

                            @auth
                                @livewire("comment",['blog'=>$blog])
                            @elseauth
                                <div>
                                    <p class="alert alert-warning"> برای کامنت گذاشتن ابتدا <a href="{{url("login")}}">وارد</a> شوید</p>
                                </div>
                            @endauth

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <aside class="widget-area" id="secondary">
                            <section class="widget widget_search">
                                <form class="search-form">
                                    <label>
                                        <span class="screen-reader-text">جستجو برای:</span>
                                        <input type="search" class="search-field" placeholder="جستجو برای ...">
                                    </label>
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </section>
                            <section class="widget widget_luvion_posts_thumb">
                                <h3 class="widget-title">انتشارات محبوب</h3>
                                @foreach($suggested_blogs as $suggested_blog)
                                <article class="item">
                                    <a href="{{route('blogs.show',['blog'=>$suggested_blog->slug])}}" class="thumb">
                                        <span>
                                            <img src="{{asset('assets/blogs/'.$suggested_blog->image)}}" alt="">
                                        </span>
                                    </a>
                                    <div class="info">
                                        <time datetime="2019-06-30">{{\Morilog\Jalali\Jalalian::forge($suggested_blog->created_at)->ago()}}</time>
                                        <h4 class="title usmall"><a href="#">{{$suggested_blog->title}}</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>
                                @endforeach
                            </section>

                            <section class="widget widget_categories">
                                <h3 class="widget-title">دسته بندی ها</h3>
                                <ul>
                                    <li><a href="{{route('blogs',['category' => $blog->category->name])}}">{{$blog->category->name}}</a></li>
                                </ul>
                            </section>
                            <br>

                            <section class="widget widget_tag_cloud">
                                <h3 class="widget-title">برچسب ها</h3>

                                <div class="tagcloud">
                                    @foreach($blog->tags as $tag)
                                    <a href="{{route('blogs',['tag'=>$tag->name])}}">{{$tag->name}} {{-- <span class="tag-link-count"> (3)</span> --}}</a>
                                    @endforeach
                                </div>
                            </section>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Details Area -->

        <!-- End Account Create Area -->

@include("layouts.footer")
