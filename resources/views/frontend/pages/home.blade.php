@extends('frontend.layouts.master')
@section('title')
    Home
@endsection
@push('style')
@endpush
@section('content')

    <div>
        <div class="container">
            <div class="news-area">
                @php
                    $breaking_news = App\Models\Post::where('breaking_news', 1)
                        ->latest('id')
                        ->limit(20)
                        ->select('title_en', 'title_bn')
                        ->get();
                @endphp
                @if (session()->get('lang') == 'english')
                    <div class="title">Breaking News :</div>
                @else
                    <div class="title">ব্রেকিং নিউজ :</div>
                @endif
                <div class="news-wrap">
                    <div class="row slick-marquee">
                        @foreach ($breaking_news as $news)
                            @if (session()->get('lang') == 'english')
                                <div class="col-auto"><a href="#" class="breaking-news">{{ $news->title_en }}</a></div>
                            @else
                                <div class="col-auto"><a href="#" class="breaking-news">{{ $news->title_bn }}</a></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@if ($notice->active==1)
<div class="container mt-1">
    <div class="news-area">
   
        @if (session()->get('lang') == 'english')
            <div class="title">Notice :</div>
        @else
            <div class="title">নোটিশ :</div>
        @endif
        <div class="news-wrap">
            <div class="row slick-marquee">
                    @if (session()->get('lang') == 'english')
                        <div class="col-auto"><a href="#" class="breaking-news">{{ $notice->notice_en }}</a></div>
                    @else
                        <div class="col-auto"><a href="#" class="breaking-news">{{ $notice->notice_bn }}</a></div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endif
       
    </div>


    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="row gy-4">
                        <div class="col-xl-12 col-sm-6 border-blog dark-theme img-overlay2">
                            <div class="blog-style3">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_5_16.jpg"
                                        alt="blog image">
                                </div>
                                <div class="blog-content"><a data-theme-color="#00D084" href="blog.html"
                                        class="category">Business</a>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Leadership
                                            for the People By the people</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>12 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-6 border-blog dark-theme img-overlay2">
                            <div class="blog-style3">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_5_17.jpg"
                                        alt="blog image">
                                </div>
                                <div class="blog-content"><a data-theme-color="#4E4BD0" href="blog.html"
                                        class="category">Sports</a>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Game on!
                                            Stay ahead with Sports updates</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>11 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 mt-4 mt-xl-0">
                    <div class="dark-theme img-overlay2">
                        <div class="blog-style3">
                            <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_5_18.jpg"
                                    alt="blog image"></div>
                            <div class="blog-content"><a data-theme-color="#FF9500" href="blog.html"
                                    class="category">Politics</a>
                                <h3 class="box-title-30"><a class="hover-line" href="blog-details.html">Following the
                                        Moon, they are in Close space. choose the best</a></h3>
                                <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                        Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>25 Mar,
                                        2023</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mt-35 mt-xl-0">
                    <div class="nav tab-menu indicator-active" role="tablist"><button class="tab-btn active"
                            id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab"
                            aria-controls="nav-one" aria-selected="true">Top News</button> <button class="tab-btn"
                            id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab"
                            aria-controls="nav-two" aria-selected="false">Recent
                            News</button></div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row gy-4">
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_1.jpg" alt="blog image">
                                        </div>
                                        <div class="blog-content"><a data-theme-color="#FF9500" href="blog.html"
                                                class="category">Politics</a>
                                            <h3 class="box-title-18"><a class="hover-line" href="blog-details.html">Stay
                                                    informed, Navigate the world</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>30 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#007BFF" href="blog.html"
                                                class="category">Travel</a>
                                            <h3 class="box-title-18"><a class="hover-line" href="blog-details.html">Your
                                                    beach resort Sanctuary.</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>17 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_3.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#00D084" href="blog.html"
                                                class="category">Life Style</a>
                                            <h3 class="box-title-18"><a class="hover-line" href="blog-details.html">Style
                                                    your life news For modern living</a>
                                            </h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>19 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_4.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#4E4BD0" href="blog.html"
                                                class="category">Sports</a>
                                            <h3 class="box-title-18"><a class="hover-line" href="blog-details.html">Score
                                                    big with the Latest sports news.</a>
                                            </h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>29 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                            <div class="row gy-4">
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_3.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#00D084" href="blog.html"
                                                class="category">Life Style</a>
                                            <h3 class="box-title-18"><a class="hover-line" href="blog-details.html">Style
                                                    your life news For modern living</a>
                                            </h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>10 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_4.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#4E4BD0" href="blog.html"
                                                class="category">Sports</a>
                                            <h3 class="box-title-18"><a class="hover-line" href="blog-details.html">Score
                                                    big with the Latest sports news.</a>
                                            </h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>13 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_5.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#868101" href="blog.html"
                                                class="category">Action</a>
                                            <h3 class="box-title-18"><a class="hover-line"
                                                    href="blog-details.html">Adventure awaits, seize the moment</a>
                                            </h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>18 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_6.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#868101" href="blog.html"
                                                class="category">Thriller</a>
                                            <h3 class="box-title-18"><a class="hover-line" href="blog-details.html">brace
                                                    yourself for thrilling
                                                    adventure.</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>27 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">Trending News</h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="icon-box"><button data-slick-prev="#blog-slide1" class="slick-arrow default"><i
                                    class="far fa-arrow-left"></i></button> <button data-slick-next="#blog-slide1"
                                class="slick-arrow default"><i class="far fa-arrow-right"></i></button></div>
                    </div>
                </div>
            </div>
            <div class="row th-carousel" id="blog-slide1" data-slide-show="4" data-lg-slide-show="3"
                data-md-slide-show="2" data-sm-slide-show="2">
                <div class="col-sm-6 col-xl-4">
                    <div class="blog-style1">
                        <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_1.jpg"
                                alt="blog image"> <a data-theme-color="#00D084" href="blog.html"
                                class="category">Lifestyle</a></div>
                        <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Balance harmony and
                                joy in Every lifestyle.</a></h3>
                        <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By - Tnews</a> <a
                                href="blog.html"><i class="fal fa-calendar-days"></i>23 Mar, 2023</a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="blog-style1">
                        <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_2.jpg"
                                alt="blog image"> <a data-theme-color="#FF9500" href="blog.html"
                                class="category">Politics</a></div>
                        <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Power to the people
                                for a Better future!</a></h3>
                        <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By - Tnews</a> <a
                                href="blog.html"><i class="fal fa-calendar-days"></i>27 Mar, 2023</a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="blog-style1">
                        <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_3.jpg"
                                alt="blog image"> <a data-theme-color="#E7473C" href="blog.html"
                                class="category">Fitness</a></div>
                        <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Fitness the key to
                                vitality and Well-being.</a></h3>
                        <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By - Tnews</a> <a
                                href="blog.html"><i class="fal fa-calendar-days"></i>21 Mar, 2023</a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="blog-style1">
                        <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_4.jpg"
                                alt="blog image"> <a data-theme-color="#00D084" href="blog.html"
                                class="category">Health</a></div>
                        <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Embrace bump and
                                Victory volleyball style.</a></h3>
                        <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By - Tnews</a> <a
                                href="blog.html"><i class="fal fa-calendar-days"></i>20 Mar, 2023</a></div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="blog-style1">
                        <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_5.jpg"
                                alt="blog image"> <a data-theme-color="#FF9500" href="blog.html"
                                class="category">Politics</a></div>
                        <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Leadership for the
                                People By the people</a></h3>
                        <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By - Tnews</a> <a
                                href="blog.html"><i class="fal fa-calendar-days"></i>17 Mar, 2023</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">Technology News</h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><button data-filter=".game" class="tab-btn active"
                                type="button">Games</button> <button data-filter=".robotic" class="tab-btn"
                                type="button">Robotic</button> <button data-filter=".electric" class="tab-btn"
                                type="button">Electric</button></div>
                    </div>
                </div>
            </div>
            <div class="filter-active-cat1">
                <div class="row filter-item active-filter game">
                    <div class="col-xl-6 mb-35 mb-xl-0">
                        <div class="">
                            <div class="blog-style1 style-big">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_2_2.jpg"
                                        alt="blog image"> <a data-theme-color="#007BFF" href="blog.html"
                                        class="category">Technology</a>
                                </div>
                                <h3 class="box-title-30"><a class="hover-line" href="blog-details.html">Following the
                                        Moon, they are in Close space. choose the best</a></h3>
                                <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                        Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>15 Mar,
                                        2023</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row gy-4">
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_7.jpg"
                                            alt="blog image">
                                        <a data-theme-color="#007BFF" href="blog.html" class="category">Technology</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Game on!
                                            Stay ahead with Sports updates</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>10 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_8.jpg"
                                            alt="blog image">
                                        <a data-theme-color="#FF9500" href="blog.html" class="category">Electric</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Electrify
                                            your world, embrace Sustainable energy.</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>21 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_9.jpg"
                                            alt="blog image">
                                        <a data-theme-color="#00D084" href="blog.html" class="category">Game</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Level up
                                            your world, embrace Gaming passion</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>25 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img
                                            src="{{ asset('assets/frontend') }}/img/blog/blog_1_10.jpg" alt="blog image">
                                        <a data-theme-color="#4E4BD0" href="blog.html" class="category">Robotic</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Robotic
                                            precision, shaping a World of possibilities.</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>29 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row filter-item robotic">
                    <div class="col-xl-6 mb-35 mb-xl-0">
                        <div class="">
                            <div class="blog-style1 style-big">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_2_2.jpg"
                                        alt="blog image"> <a data-theme-color="#007BFF" href="blog.html"
                                        class="category">Technology</a>
                                </div>
                                <h3 class="box-title-30"><a class="hover-line" href="blog-details.html">Following the
                                        Moon, they are in Close space. choose the best</a></h3>
                                <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                        Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>27 Mar,
                                        2023</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row gy-4">
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_6.jpg"
                                            alt="blog image">
                                        <a data-theme-color="#4E4BD0" href="blog.html" class="category">Sports</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Game on!
                                            Stay ahead withn Sports updates</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>29 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_7.jpg"
                                            alt="blog image">
                                        <a data-theme-color="#007BFF" href="blog.html" class="category">Technology</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Game on!
                                            Stay ahead with Sports updates</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>26 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_8.jpg"
                                            alt="blog image">
                                        <a data-theme-color="#FF9500" href="blog.html" class="category">Electric</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Electrify
                                            your world, embrace Sustainable energy.</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>23 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_9.jpg"
                                            alt="blog image">
                                        <a data-theme-color="#00D084" href="blog.html" class="category">Game</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Level up
                                            your world, embrace Gaming passion</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>26 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row filter-item electric">
                    <div class="col-xl-6 mb-35 mb-xl-0">
                        <div class="">
                            <div class="blog-style1 style-big">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_2_2.jpg"
                                        alt="blog image"> <a data-theme-color="#007BFF" href="blog.html"
                                        class="category">Technology</a>
                                </div>
                                <h3 class="box-title-30"><a class="hover-line" href="blog-details.html">Following the
                                        Moon, they are in Close space. choose the best</a></h3>
                                <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                        Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>12 Mar,
                                        2023</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row gy-4">
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_5.jpg"
                                            alt="blog image">
                                        <a data-theme-color="#FF9500" href="blog.html" class="category">Politics</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Leadership
                                            for the People By the people</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>12 Mar,
                                            2023</a></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_6.jpg"
                                            alt="blog image">
                                        <a data-theme-color="#4E4BD0" href="blog.html" class="category">Sports</a>
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Game
                                            on! Stay ahead withn Sports updates</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>24
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_7.jpg"
                                            alt="blog image"> <a data-theme-color="#007BFF" href="blog.html"
                                            class="category">Technology</a></div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Game
                                            on! Stay ahead with Sports updates</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>29
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 border-blog two-column">
                                <div class="blog-style1">
                                    <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_1_8.jpg"
                                            alt="blog image"> <a data-theme-color="#FF9500" href="blog.html"
                                            class="category">Electric</a></div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Electrify
                                            your world, embrace Sustainable
                                            energy.</a></h3>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>28
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container"><a href="https://themeforest.net/user/themeholy/portfolio"><img
                src="{{ asset('assets/frontend') }}/img/ads/ads_1.jpg" alt="ads" class="w-100"></a></div>
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <h2 class="sec-title has-line">International News</h2>
                    <div class="row gy-4">
                        <div class="col-sm-6 border-blog two-column">
                            <div class="blog-style1">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_4_1.jpg"
                                        alt="blog image"> <a data-theme-color="#FF9500" href="blog.html"
                                        class="category">Politics</a>
                                </div>
                                <h3 class="box-title-24"><a class="hover-line" href="blog-details.html">Relaxation
                                        redefined, your beach Resort sanctuary</a></h3>
                                <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                        Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>10 Mar,
                                        2023</a></div>
                            </div>
                        </div>
                        <div class="col-sm-6 border-blog two-column">
                            <div class="blog-style1">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_4_2.jpg"
                                        alt="blog image"> <a data-theme-color="#4E4BD0" href="blog.html"
                                        class="category">Sports</a>
                                </div>
                                <h3 class="box-title-24"><a class="hover-line" href="blog-details.html">Game on!
                                        Embrace the spirit of Competition them</a></h3>
                                <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                        Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>29 Mar,
                                        2023</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mt-35 mt-xl-0">
                    <div class="nav tab-menu indicator-active" role="tablist"><button class="tab-btn active"
                            id="nav2-one-tab" data-bs-toggle="tab" data-bs-target="#nav2-one" type="button"
                            role="tab" aria-controls="nav2-one" aria-selected="true">Tranding</button> <button
                            class="tab-btn" id="nav2-two-tab" data-bs-toggle="tab" data-bs-target="#nav2-two"
                            type="button" role="tab" aria-controls="nav2-two" aria-selected="false">Recent</button>
                        <button class="tab-btn" id="nav2-three-tab" data-bs-toggle="tab" data-bs-target="#nav2-three"
                            type="button" role="tab" aria-controls="nav2-three"
                            aria-selected="false">Popular</button>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav2-one" role="tabpanel"
                            aria-labelledby="nav2-one-tab">
                            <div class="row gy-4">
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2_1.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#4E4BD0" href="blog.html"
                                                class="category">Sports</a>
                                            <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Fast
                                                    breaks, slam dunks Basketball
                                                    thrills.</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>14 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2_2.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#00D084" href="blog.html"
                                                class="category">Health</a>
                                            <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Life,
                                                    a canvas, paint your
                                                    Masterpiece.</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>28 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2_3.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#E7473C" href="blog.html"
                                                class="category">Fitness</a>
                                            <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Fuel
                                                    your fire, embrace Fitness
                                                    goals.</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>29 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav2-two" role="tabpanel" aria-labelledby="nav2-two-tab">
                            <div class="row gy-4">
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2_2.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#00D084" href="blog.html"
                                                class="category">Health</a>
                                            <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Life,
                                                    a canvas, paint your
                                                    Masterpiece.</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>11 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2_3.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#E7473C" href="blog.html"
                                                class="category">Fitness</a>
                                            <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Fuel
                                                    your fire, embrace Fitness
                                                    goals.</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>30 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2_4.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#59C2D6" href="blog.html"
                                                class="category">Fashion</a>
                                            <h3 class="box-title-20"><a class="hover-line"
                                                    href="blog-details.html">Fashion is an art, express Yourself
                                                    beautifully</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>21 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav2-three" role="tabpanel" aria-labelledby="nav2-three-tab">
                            <div class="row gy-4">
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2_3.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#E7473C" href="blog.html"
                                                class="category">Fitness</a>
                                            <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Fuel
                                                    your fire, embrace Fitness
                                                    goals.</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>21 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2_4.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#59C2D6" href="blog.html"
                                                class="category">Fashion</a>
                                            <h3 class="box-title-20"><a class="hover-line"
                                                    href="blog-details.html">Fashion is an art, express Yourself
                                                    beautifully</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>24 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 border-blog">
                                    <div class="blog-style2">
                                        <div class="blog-img"><img
                                                src="{{ asset('assets/frontend') }}/img/blog/blog_3_2_5.jpg"
                                                alt="blog image"></div>
                                        <div class="blog-content"><a data-theme-color="#E8137D" href="blog.html"
                                                class="category">Sports</a>
                                            <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Tune
                                                    in, turn up, and let the Music
                                                    speak</a></h3>
                                            <div class="blog-meta"><a href="blog.html"><i
                                                        class="fal fa-calendar-days"></i>28 Mar, 2023</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="space dark-theme bg-title-dark">
        <div class="container">
            <h2 class="sec-title has-line">Latest Video Playlist</h2>
            <div class="row">
                <div class="col-xl-4 col-lg-2">
                    <div class="blog-tab" data-asnavfor=".blog-tab-slide">
                        <div class="tab-btn active">
                            <div class="blog-style2">
                                <div class="blog-img img-100"><img
                                        src="{{ asset('assets/frontend') }}/img/blog/blog_3_9.jpg" alt="blog image">
                                    <div class="icon"><i class="fal fa-waveform-lines"></i></div><a
                                        href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i
                                            class="fas fa-play"></i></a>
                                </div>
                                <div class="blog-content"><a data-theme-color="#019D9E" href="blog.html"
                                        class="category">Animals</a>
                                    <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Cat-tastic
                                            updates, keeping you feline fine</a>
                                    </h3>
                                    <div class="blog-meta"><a href="blog.html"><i class="fal fa-calendar-days"></i>18
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-btn">
                            <div class="blog-style2">
                                <div class="blog-img img-100"><img
                                        src="{{ asset('assets/frontend') }}/img/blog/blog_3_10.jpg" alt="blog image">
                                    <div class="icon"><i class="fal fa-waveform-lines"></i></div><a
                                        href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i
                                            class="fas fa-play"></i></a>
                                </div>
                                <div class="blog-content"><a data-theme-color="#00D084" href="blog.html"
                                        class="category">Health</a>
                                    <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Holistic
                                            Living: Balancing Mind, Body, and
                                            Soul</a></h3>
                                    <div class="blog-meta"><a href="blog.html"><i class="fal fa-calendar-days"></i>14
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-btn">
                            <div class="blog-style2">
                                <div class="blog-img img-100"><img
                                        src="{{ asset('assets/frontend') }}/img/blog/blog_3_11.jpg" alt="blog image">
                                    <div class="icon"><i class="fal fa-waveform-lines"></i></div><a
                                        href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i
                                            class="fas fa-play"></i></a>
                                </div>
                                <div class="blog-content"><a data-theme-color="#FF1D50" href="blog.html"
                                        class="category">Fitness</a>
                                    <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Sweat
                                            and Success Tales of Dedication in Fitness</a></h3>
                                    <div class="blog-meta"><a href="blog.html"><i class="fal fa-calendar-days"></i>24
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-btn">
                            <div class="blog-style2">
                                <div class="blog-img img-100"><img
                                        src="{{ asset('assets/frontend') }}/img/blog/blog_3_12.jpg" alt="blog image">
                                    <div class="icon"><i class="fal fa-waveform-lines"></i></div><a
                                        href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i
                                            class="fas fa-play"></i></a>
                                </div>
                                <div class="blog-content"><a data-theme-color="#007BFF" href="blog.html"
                                        class="category">Technology</a>
                                    <h3 class="box-title-20"><a class="hover-line" href="blog-details.html">Tech
                                            Horizons Navigating the Digital Landscape</a></h3>
                                    <div class="blog-meta"><a href="blog.html"><i class="fal fa-calendar-days"></i>30
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-10">
                    <div class="blog-tab-slide th-carousel" data-fade="true" data-slide-show="1" data-md-slide-show="1">
                        <div class="">
                            <div class="blog-style8">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_9_1.jpg"
                                        alt="blog image"> <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                        class="play-btn popup-video"><i class="fas fa-play"></i></a></div>
                                <h3 class="box-title-30"><a class="hover-line" href="blog-details.html">Cat-tastic
                                        updates, keeping you feline fine</a></h3>
                                <div class="blog-meta"><a data-theme-color="#019D9E" href="blog.html"
                                        class="category">Animals</a> <a href="author.html"><i class="far fa-user"></i>By
                                        - Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>12 Mar,
                                        2023</a></div>
                            </div>
                        </div>
                        <div class="">
                            <div class="blog-style8">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_9_2.jpg"
                                        alt="blog image"> <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                        class="play-btn popup-video"><i class="fas fa-play"></i></a></div>
                                <h3 class="box-title-30"><a class="hover-line" href="blog-details.html">Holistic
                                        Living: Balancing Mind, Body, and Soul</a></h3>
                                <div class="blog-meta"><a data-theme-color="#00D084" href="blog.html"
                                        class="category">Health</a> <a href="author.html"><i class="far fa-user"></i>By -
                                        Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>16 Mar, 2023</a>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="blog-style8">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_9_3.jpg"
                                        alt="blog image"> <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                        class="play-btn popup-video"><i class="fas fa-play"></i></a></div>
                                <h3 class="box-title-30"><a class="hover-line" href="blog-details.html">Sweat and
                                        Success Tales of Dedication in Fitness</a></h3>
                                <div class="blog-meta"><a data-theme-color="#FF1D50" href="blog.html"
                                        class="category">Fitness</a> <a href="author.html"><i class="far fa-user"></i>By
                                        - Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>29 Mar,
                                        2023</a></div>
                            </div>
                        </div>
                        <div class="">
                            <div class="blog-style8">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_9_4.jpg"
                                        alt="blog image"> <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                        class="play-btn popup-video"><i class="fas fa-play"></i></a></div>
                                <h3 class="box-title-30"><a class="hover-line" href="blog-details.html">Tech
                                        Horizons Navigating the Digital Landscape</a></h3>
                                <div class="blog-meta"><a data-theme-color="#007BFF" href="blog.html"
                                        class="category">Technology</a> <a href="author.html"><i
                                            class="far fa-user"></i>By - Tnews</a> <a href="blog.html"><i
                                            class="fal fa-calendar-days"></i>15 Mar, 2023</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="sec-title has-line">Popular News</h2>
                        </div>
                        <div class="col-auto">
                            <div class="sec-btn">
                                <div class="filter-menu filter-menu-active"><button data-filter="*"
                                        class="tab-btn active" type="button">ALL</button> <button data-filter=".cat1"
                                        class="tab-btn" type="button">Travel</button> <button data-filter=".cat2"
                                        class="tab-btn" type="button">Politics</button>
                                    <button data-filter=".cat3" class="tab-btn" type="button">Fitness</button>
                                    <button data-filter=".cat4" class="tab-btn" type="button">Fashion</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-active">
                        <div class="border-blog2 filter-item cat1">
                            <div class="blog-style4">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_6_1.jpg"
                                        alt="blog image">
                                </div>
                                <div class="blog-content"><a data-theme-color="#007BFF" href="blog.html"
                                        class="category">Travel</a>
                                    <h3 class="box-title-24"><a class="hover-line" href="blog-details.html">From
                                            catwalk to campaigns, modeling news revealed Vibrant</a></h3>
                                    <p class="blog-text">Quisque eget ex rutrum, consequat odio in, tempor purus.
                                        Mauris neque quam, Tellentesque sit amet rutrum ut, gravida sit amet felis.</p>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>27
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="border-blog2 filter-item cat4">
                            <div class="blog-style4">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_6_2.jpg"
                                        alt="blog image">
                                </div>
                                <div class="blog-content"><a data-theme-color="#59C2D6" href="blog.html"
                                        class="category">Fashion</a>
                                    <h3 class="box-title-24"><a class="hover-line" href="blog-details.html">Explore,
                                            wander, immerse: let your travels paint
                                            stories of life</a></h3>
                                    <p class="blog-text">Quisque eget ex rutrum, consequat odio in, tempor purus.
                                        Mauris neque quam, Tellentesque sit amet rutrum ut, gravida sit amet felis.</p>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>28
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="border-blog2 filter-item cat2">
                            <div class="blog-style4">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_6_3.jpg"
                                        alt="blog image">
                                </div>
                                <div class="blog-content"><a data-theme-color="#FF9500" href="blog.html"
                                        class="category">Politics</a>
                                    <h3 class="box-title-24"><a class="hover-line" href="blog-details.html">Vote
                                            with conviction, champion change Shape the destiny of politics</a></h3>
                                    <p class="blog-text">Quisque eget ex rutrum, consequat odio in, tempor purus.
                                        Mauris neque quam, Tellentesque sit amet rutrum ut, gravida sit amet felis.</p>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>19
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="border-blog2 filter-item cat1">
                            <div class="blog-style4">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_6_4.jpg"
                                        alt="blog image">
                                </div>
                                <div class="blog-content"><a data-theme-color="#007BFF" href="blog.html"
                                        class="category">Travel</a>
                                    <h3 class="box-title-24"><a class="hover-line" href="blog-details.html">From
                                            catwalk to campaigns, modeling news Revealed get popular</a></h3>
                                    <p class="blog-text">Quisque eget ex rutrum, consequat odio in, tempor purus.
                                        Mauris neque quam, Tellentesque sit amet rutrum ut, gravida sit amet felis.</p>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>14
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="border-blog2 filter-item cat3">
                            <div class="blog-style4">
                                <div class="blog-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog_6_5.jpg"
                                        alt="blog image">
                                </div>
                                <div class="blog-content"><a data-theme-color="#E7473C" href="blog.html"
                                        class="category">Fitness</a>
                                    <h3 class="box-title-24"><a class="hover-line" href="blog-details.html">Embrace
                                            the grind, sweat, dedication Witness your
                                            fitness transformation.</a></h3>
                                    <p class="blog-text">Quisque eget ex rutrum, consequat odio in, tempor purus.
                                        Mauris neque quam, Tellentesque sit amet rutrum ut, gravida sit amet felis.</p>
                                    <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                            Tnews</a> <a href="blog.html"><i class="fal fa-calendar-days"></i>26
                                            Mar, 2023</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mt-35 mt-xl-0 mb-10 sidebar-wrap">
                    <div class="sidebar-area">
                        <div class="widget mb-30">
                            <div class="widget-ads"><a href="https://themeforest.net/user/themeholy/portfolio"><img
                                        class="w-100" src="{{ asset('assets/frontend') }}/img/ads/siderbar_ads_1.jpg"
                                        alt="ads"></a>
                            </div>
                        </div>
                        @if ($liveTV->active == 1)
                            <div class="widget mb-30">
                                @if (session()->get('lang') == 'english')
                                    <div class="text-center text-white py-1 text-bold mb-1"
                                        style="background-color: #FF1D50; font-weight: 600">Live TV</div>
                                @else
                                    <div class="text-center text-white py-1 text-bold mb-1"
                                        style="background-color: #FF1D50; font-weight: 600">লাইভ টিভি</div>
                                @endif

                                {!! $liveTV->embed_code !!}
                            </div>
                        @endif
                        <div class="nav tab-menu indicator-active" role="tablist"><button class="tab-btn active"
                                id="nav3-one-tab" data-bs-toggle="tab" data-bs-target="#nav3-one" type="button"
                                role="tab" aria-controls="nav3-one" aria-selected="true">Top Rated</button>
                            <button class="tab-btn" id="nav3-two-tab" data-bs-toggle="tab"
                                data-bs-target="#nav3-two" type="button" role="tab" aria-controls="nav3-two"
                                aria-selected="false">Tranding</button> <button class="tab-btn" id="nav3-three-tab"
                                data-bs-toggle="tab" data-bs-target="#nav3-three" type="button" role="tab"
                                aria-controls="nav3-three" aria-selected="false">Recent</button>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav3-one" role="tabpanel"
                                aria-labelledby="nav3-one-tab">
                                <div class="row gy-4">
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_1.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#FF9500" href="blog.html"
                                                    class="category">Politics</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Stay informed, Navigate the world</a>
                                                </h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>24 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_2.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#007BFF" href="blog.html"
                                                    class="category">Travel</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Your beach resort Sanctuary.</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>24 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_3.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#00D084" href="blog.html"
                                                    class="category">Life Style</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Style your life news For modern
                                                        living</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>30 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_4.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#4E4BD0" href="blog.html"
                                                    class="category">Sports</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Score big with the Latest sports
                                                        news.</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>28 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav3-two" role="tabpanel"
                                aria-labelledby="nav3-two-tab">
                                <div class="row gy-4">
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_2.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#007BFF" href="blog.html"
                                                    class="category">Travel</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Your beach resort Sanctuary.</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>20 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_3.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#00D084" href="blog.html"
                                                    class="category">Life Style</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Style your life news For modern
                                                        living</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>28 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_4.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#4E4BD0" href="blog.html"
                                                    class="category">Sports</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Score big with the Latest sports
                                                        news.</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>20 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_5.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#868101" href="blog.html"
                                                    class="category">Action</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Adventure awaits, seize the
                                                        moment</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>26 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav3-three" role="tabpanel"
                                aria-labelledby="nav3-three-tab">
                                <div class="row gy-4">
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_3.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#00D084" href="blog.html"
                                                    class="category">Life Style</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Style your life news For modern
                                                        living</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>23 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_4.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#4E4BD0" href="blog.html"
                                                    class="category">Sports</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Score big with the Latest sports
                                                        news.</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>18 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_5.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#868101" href="blog.html"
                                                    class="category">Action</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">Adventure awaits, seize the
                                                        moment</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>28 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/blog_3_6.jpg"
                                                    alt="blog image"></div>
                                            <div class="blog-content"><a data-theme-color="#868101" href="blog.html"
                                                    class="category">Thriller</a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="blog-details.html">brace yourself for thrilling
                                                        adventure.</a></h3>
                                                <div class="blog-meta"><a href="blog.html"><i
                                                            class="fal fa-calendar-days"></i>14 Mar, 2023</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
