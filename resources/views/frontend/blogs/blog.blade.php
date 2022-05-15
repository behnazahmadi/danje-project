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

        <title>Luvion - قالب HTML لوویون , پوسته چندمنظوره شرکتی بانکداری آنلاین و پردازش پرداخت</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <style>
            .blog-image{
                position: relative;
            }
            .blog-image .fa-bookmark{
                position: absolute;
                left: 10px;
                top: 10px;
                font-size: 25px;
                color: white;
            }
        </style>
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

        <!-- Start Blog Area -->
		<section class="blog-area ptb-70">
			<div class="container">
				<div class="row">
                  @if($blogs->count())
                        @foreach($blogs as $blog)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-blog-post">
                                    <div class="blog-image">
                                        <a href="#">
                                            <img src="{{asset("assets/blogs/$blog->image")}}" alt="image">
                                        </a>
                                        @livewire("bookmark",["blog"=>$blog])

                                        <div class="date">
                                            <i class="far fa-calendar-alt"></i>{{\Morilog\Jalali\Jalalian::forge($blog->created_at)->ago()}}
                                        </div>
                                    </div>

                                    <div class="blog-post-content">
                                        <h3><a href="{{route("blogs.show",['blog' => $blog->slug])}}">{{$blog->title}}</a></h3>
                                        <span>توسط <a href="#">مدیر</a></span>

                                        <p>{{shorter("لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.",50)}}</p>

                                        <a href="{{route("blogs.show",['blog' => $blog->slug])}}" class="read-more-btn">بیشتر بدانید <i class="fas fa-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                  @else
                      <p class="alert alert-warning">بلاگی برای نمایش وجود ندارد!</p>
                  @endif
                    <div class="col-lg-12 col-md-12">
                       {{$blogs->links()}}
                    </div>
				</div>
			</div>
		</section>
        <!-- End Blog Area -->

@include("layouts.footer")
