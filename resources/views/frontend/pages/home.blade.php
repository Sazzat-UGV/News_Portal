@extends('frontend.layouts.master')
@section('title')
    Home
@endsection
@push('style')
@endpush
@section('content')
    @php
        $categories = App\Models\Category::all();
        $category_colors = [];

        foreach ($categories as $category) {
            switch ($category->id) {
                case 1:
                    $category_colors[$category->id] = '#00D084';
                    break;
                case 2:
                    $category_colors[$category->id] = '#FF9500';
                    break;
                case 3:
                    $category_colors[$category->id] = '#4E4BD0';
                    break;
                case 4:
                    $category_colors[$category->id] = '#868101';
                    break;
                case 5:
                    $category_colors[$category->id] = '#007BFF';
                    break;
                case 6:
                    $category_colors[$category->id] = '#E7473C';
                    break;
                case 7:
                    $category_colors[$category->id] = '#59C2D6';
                    break;
                case 8:
                    $category_colors[$category->id] = '#4E4BD0';
                    break;
                default:
                    $category_colors[$category->id] = '#59C2D6';
                    break;
            }
        }
    @endphp



    <div>
        <div class="container">
            <div class="news-area">
                @php
                    $breaking_news = App\Models\Post::where('breaking_news', 1)
                        ->where('status', 1)
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



        @if ($notice->active == 1)
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
                                <div class="col-auto"><a href="#" class="breaking-news">{{ $notice->notice_en }}</a>
                                </div>
                            @else
                                <div class="col-auto"><a href="#" class="breaking-news">{{ $notice->notice_bn }}</a>
                                </div>
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
                    <div class="row ">
                        @foreach ($first_sections as $first_section)
                            <div class="col-xl-12 col-sm-6 border-blog dark-theme img-overlay2">
                                <div class="blog-style3">
                                    <div class="blog-img"><img
                                            src="{{ asset('uploads/thumbnail') }}/{{ $first_section->thumbnail }}"
                                            alt="blog image">
                                    </div>
                                    <div class="blog-content"><a
                                            data-theme-color=" {{ $category_colors[$first_section->category->id] }}"
                                            href="#" class="category">
                                            @if (session()->get('lang') == 'english')
                                                {{ $first_section->category->category_name_en }}
                                            @else
                                                {{ $first_section->category->category_name_bn }}
                                            @endif
                                        </a>
                                        <h3 class="box-title-22"><a class="hover-line" href="#">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $first_section->title_en }}
                                                @else
                                                    {{ $first_section->title_bn }}
                                                @endif
                                            </a></h3>
                                        <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                                {{ $first_section->user->name }}</a> <a href="#"><i
                                                    class="fal fa-calendar-days"></i>{{ $first_section->created_at->format('d M, Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>


                <div class="col-xl-6 mt-4 mt-xl-0">
                    <div class="dark-theme img-overlay2">
                        <div class="blog-style3">
                            <div class="blog-img"><img
                                    src="{{ asset('uploads/thumbnail') }}/{{ $firstSectionBigThumbnail->thumbnail }}"
                                    alt="blog image"></div>
                            <div class="blog-content"><a
                                    data-theme-color=" {{ $category_colors[$firstSectionBigThumbnail->category->id] }}"
                                    href="#" class="category">
                                    @if (session()->get('lang') == 'english')
                                        {{ $firstSectionBigThumbnail->category->category_name_en }}
                                    @else
                                        {{ $firstSectionBigThumbnail->category->category_name_bn }}
                                    @endif
                                </a>
                                <h3 class="box-title-30"><a class="hover-line" href="#">
                                        @if (session()->get('lang') == 'english')
                                            {{ $firstSectionBigThumbnail->title_en }}
                                        @else
                                            {{ $firstSectionBigThumbnail->title_bn }}
                                        @endif
                                    </a></h3>
                                <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                        {{ $firstSectionBigThumbnail->user->name }}</a> <a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $firstSectionBigThumbnail->created_at->format('d M, Y') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 mt-35 mt-xl-0">
                    <div class="nav tab-menu indicator-active" role="tablist"><button class="tab-btn active"
                            id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab"
                            aria-controls="nav-one" aria-selected="true">
                            @if (session()->get('lang') == 'english')
                                Favourite
                            @else
                                জনপ্রিয়
                            @endif
                        </button> <button class="tab-btn" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two"
                            type="button" role="tab" aria-controls="nav-two" aria-selected="false">
                            @if (session()->get('lang') == 'english')
                                Recent News
                            @else
                                সাম্প্রতিক খবর
                            @endif
                        </button></div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row gy-4">
                                @foreach ($favourites as $favourite)
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('uploads/thumbnail') }}/{{ $favourite->thumbnail }}"
                                                    alt="#"></div>
                                            <div class="blog-content"><a
                                                    data-theme-color="{{ $category_colors[$favourite->category->id] }}"
                                                    href="blog.html" class="category">
                                                    @if (session()->get('lang') == 'english')
                                                        {{ $favourite->category->category_name_en }}
                                                    @else
                                                        {{ $favourite->category->category_name_bn }}
                                                    @endif
                                                </a>
                                                <h3 class="box-title-18"><a class="hover-line" href="#">
                                                        @if (session()->get('lang') == 'english')
                                                            {{ $favourite->title_en }}
                                                        @else
                                                            {{ $favourite->title_bn }}
                                                        @endif
                                                    </a>
                                                </h3>
                                                <div class="blog-meta"><a href="#"><i
                                                            class="fal fa-calendar-days"></i>{{ $favourite->created_at->format('d M, Y') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                            <div class="row gy-4">
                                @foreach ($recent_news as $recent)
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <div class="blog-style2">
                                            <div class="blog-img"><img
                                                    src="{{ asset('uploads/thumbnail') }}/{{ $recent->thumbnail }}"
                                                    alt="#"></div>
                                            <div class="blog-content"><a
                                                    data-theme-color="{{ $category_colors[$recent->category->id] }}"
                                                    href="#" class="category">
                                                    @if (session()->get('lang') == 'english')
                                                        {{ $recent->category->category_name_en }}
                                                    @else
                                                        {{ $recent->category->category_name_bn }}
                                                    @endif
                                                </a>
                                                <h3 class="box-title-18"><a class="hover-line" href="#">
                                                        @if (session()->get('lang') == 'english')
                                                            {{ $recent->title_en }}
                                                        @else
                                                            {{ $recent->title_bn }}
                                                        @endif
                                                    </a>
                                                </h3>
                                                <div class="blog-meta"><a href="#"><i
                                                            class="fal fa-calendar-days"></i>{{ $recent->created_at->format('d M, Y') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @php
                            $firstcategory = App\Models\Category::where('status', 1)
                                ->select('id', 'category_name_en', 'category_name_bn')
                                ->first();
                        @endphp
                        @if (session()->get('lang') == 'english')
                            {{ $firstcategory->category_name_en }}
                        @else
                            {{ $firstcategory->category_name_bn }}
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active" href="#">
                                @if (session()->get('lang') == 'english')
                                    More
                                @else
                                    আরও
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-active-cat1">
                <div class="row filter-item active-filter game">
                    <div class="col-xl-6 mb-35 mb-xl-0">
                        <div class="">
                            <div class="blog-style1 style-big">
                                @php

                                    $firstcatbigpost = App\Models\Post::where('status', 1)
                                        ->where('category_id', $firstcategory->id)
                                        ->where('bigthumbnail', 1)
                                        ->latest('id')
                                        ->select(
                                            'id',
                                            'category_id',
                                            'user_id',
                                            'title_en',
                                            'title_bn',
                                            'thumbnail',
                                            'created_at',
                                        )
                                        ->first();

                                @endphp
                                <div class="blog-img"><img
                                        src="{{ asset('uploads/thumbnail') }}/{{ $firstcatbigpost->thumbnail }}"
                                        alt="blog image"> <a
                                        data-theme-color="{{ $category_colors[$firstcatbigpost->category->id] }}"
                                        href="#" class="category">
                                        @if (session()->get('lang') == 'english')
                                            {{ $firstcatbigpost->category->category_name_en }}
                                        @else
                                            {{ $firstcatbigpost->category->category_name_bn }}
                                        @endif
                                    </a>
                                </div>
                                <h3 class="box-title-30"><a class="hover-line" href="#">
                                        @if (session()->get('lang') == 'english')
                                            {{ $firstcatbigpost->title_en }}
                                        @else
                                            {{ $firstcatbigpost->title_bn }}
                                        @endif
                                    </a>
                                </h3>
                                <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                        {{ $firstcatbigpost->user->name }}</a> <a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $firstcatbigpost->created_at->format('d M, Y') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="row gy-4">
                            @php

                                $firstcatsmallpost = App\Models\Post::where('status', 1)
                                    ->where('category_id', $firstcategory->id)
                                    ->where('bigthumbnail', 0)
                                    ->latest('id')
                                    ->select(
                                        'id',
                                        'category_id',
                                        'user_id',
                                        'title_en',
                                        'title_bn',
                                        'thumbnail',
                                        'created_at',
                                    )
                                    ->limit(4)
                                    ->get();

                            @endphp
                            @foreach ($firstcatsmallpost as $firstsmallpost)
                                <div class="col-xl-6 col-sm-6 border-blog two-column">
                                    <div class="blog-style1">
                                        <div class="blog-img"><img
                                                src="{{ asset('uploads/thumbnail') }}/{{ $firstsmallpost->thumbnail }}"
                                                alt="blog image"> <a
                                                data-theme-color="{{ $category_colors[$firstsmallpost->category->id] }}"
                                                href="#" class="category">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $firstsmallpost->category->category_name_en }}
                                                @else
                                                    {{ $firstsmallpost->category->category_name_bn }}
                                                @endif
                                            </a>
                                        </div>
                                        <h3 class="box-title-22"><a class="hover-line" href="#">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $firstsmallpost->title_en }}
                                                @else
                                                    {{ $firstsmallpost->title_bn }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                                {{ $firstsmallpost->user->name }}</a> <a href="#"><i
                                                    class="fal fa-calendar-days"></i>{{ $firstsmallpost->created_at->format('d M, Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="container"><a href="https://themeforest.net/user/themeholy/portfolio"><img
                src="{{ asset('assets/frontend') }}/img/ads/ads_1.jpg" alt="ads" class="w-100"></a></div>


    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="sec-title has-line"> @php
                        $secondcategory = App\Models\Category::where('status', 1)
                            ->select('id', 'category_name_en', 'category_name_bn')
                            ->skip(1)
                            ->first();
                    @endphp
                        @if (session()->get('lang') == 'english')
                            {{ $secondcategory->category_name_en }}
                        @else
                            {{ $secondcategory->category_name_bn }}
                        @endif
                    </h2>

                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active" href="#">
                                @if (session()->get('lang') == 'english')
                                    More
                                @else
                                    আরও
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row gy-4">
                        @php

                            $secondcatsmallpost = App\Models\Post::where('status', 1)
                                ->where('category_id', $secondcategory->id)
                                ->where('bigthumbnail', 0)
                                ->latest('id')
                                ->select(
                                    'id',
                                    'category_id',
                                    'user_id',
                                    'title_en',
                                    'title_bn',
                                    'thumbnail',
                                    'created_at',
                                )
                                ->limit(4)
                                ->get();

                        @endphp
                        @foreach ($secondcatsmallpost as $secondsmallpost)
                            <div class="col-sm-6 col-xl-4">
                                <div class="blog-style1">
                                    <div class="blog-img"><img
                                            src="{{ asset('uploads/thumbnail') }}/{{ $secondsmallpost->thumbnail }}"
                                            alt="blog image"> <a
                                            data-theme-color="{{ $category_colors[$secondsmallpost->category->id] }}"
                                            href="#" class="category">
                                            @if (session()->get('lang') == 'english')
                                                {{ $secondsmallpost->category->category_name_en }}
                                            @else
                                                {{ $secondsmallpost->category->category_name_bn }}
                                            @endif
                                        </a></div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">
                                            @if (session()->get('lang') == 'english')
                                                {{ $secondsmallpost->title_en }}
                                            @else
                                                {{ $secondsmallpost->title_bn }}
                                            @endif
                                        </a></h3>
                                    <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                            {{ $secondsmallpost->user->name }}</a> <a href="blog.html"><i
                                                class="fal fa-calendar-days"></i>{{ $secondsmallpost->created_at->format('d M, Y') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>






    <div class="mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @php
                            $thirdcategory = App\Models\Category::where('status', 1)
                                ->select('id', 'category_name_en', 'category_name_bn')
                                ->skip(2)
                                ->first();
                        @endphp
                        @if (session()->get('lang') == 'english')
                            {{ $thirdcategory->category_name_en }}
                        @else
                            {{ $thirdcategory->category_name_bn }}
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active" href="#">
                                @if (session()->get('lang') == 'english')
                                    More
                                @else
                                    আরও
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-active-cat1">
                <div class="row filter-item active-filter game">
                    <div class="col-xl-6 mb-35 mb-xl-0">
                        <div class="">
                            <div class="blog-style1 style-big">
                                @php

                                    $thirdcatbigpost = App\Models\Post::where('status', 1)
                                        ->where('category_id', $thirdcategory->id)
                                        ->where('bigthumbnail', 1)
                                        ->latest('id')
                                        ->select(
                                            'id',
                                            'category_id',
                                            'user_id',
                                            'title_en',
                                            'title_bn',
                                            'thumbnail',
                                            'created_at',
                                        )
                                        ->first();

                                @endphp
                                <div class="blog-img"><img
                                        src="{{ asset('uploads/thumbnail') }}/{{ $thirdcatbigpost->thumbnail }}"
                                        alt="blog image"> <a
                                        data-theme-color="{{ $category_colors[$thirdcatbigpost->category->id] }}"
                                        href="#" class="category">
                                        @if (session()->get('lang') == 'english')
                                            {{ $thirdcatbigpost->category->category_name_en }}
                                        @else
                                            {{ $thirdcatbigpost->category->category_name_bn }}
                                        @endif
                                    </a>
                                </div>
                                <h3 class="box-title-30"><a class="hover-line" href="#">
                                        @if (session()->get('lang') == 'english')
                                            {{ $thirdcatbigpost->title_en }}
                                        @else
                                            {{ $thirdcatbigpost->title_bn }}
                                        @endif
                                    </a>
                                </h3>
                                <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                        {{ $thirdcatbigpost->user->name }}</a> <a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $thirdcatbigpost->created_at->format('d M, Y') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="row gy-4">
                            @php

                                $thirdcatsmallpost = App\Models\Post::where('status', 1)
                                    ->where('category_id', $thirdcategory->id)
                                    ->where('bigthumbnail', 0)
                                    ->latest('id')
                                    ->select(
                                        'id',
                                        'category_id',
                                        'user_id',
                                        'title_en',
                                        'title_bn',
                                        'thumbnail',
                                        'created_at',
                                    )
                                    ->limit(4)
                                    ->get();

                            @endphp
                            @foreach ($thirdcatsmallpost as $thirdsmallpost)
                                <div class="col-xl-6 col-sm-6 border-blog two-column">
                                    <div class="blog-style1">
                                        <div class="blog-img"><img
                                                src="{{ asset('uploads/thumbnail') }}/{{ $thirdsmallpost->thumbnail }}"
                                                alt="blog image"> <a
                                                data-theme-color="{{ $category_colors[$thirdsmallpost->category->id] }}"
                                                href="#" class="category">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $thirdsmallpost->category->category_name_en }}
                                                @else
                                                    {{ $thirdsmallpost->category->category_name_bn }}
                                                @endif
                                            </a>
                                        </div>
                                        <h3 class="box-title-22"><a class="hover-line" href="#">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $thirdsmallpost->title_en }}
                                                @else
                                                    {{ $thirdsmallpost->title_bn }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                                {{ $thirdsmallpost->user->name }}</a> <a href="#"><i
                                                    class="fal fa-calendar-days"></i>{{ $thirdsmallpost->created_at->format('d M, Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>






    <div class="container"><a href="https://themeforest.net/user/themeholy/portfolio"><img
                src="{{ asset('assets/frontend') }}/img/ads/ads_1.jpg" alt="ads" class="w-100"></a></div>





    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @php
                            $forthcategory = App\Models\Category::where('status', 1)
                                ->select('id', 'category_name_en', 'category_name_bn')
                                ->skip(3)
                                ->first();
                        @endphp
                        @if (session()->get('lang') == 'english')
                            {{ $forthcategory->category_name_en }}
                        @else
                            {{ $forthcategory->category_name_bn }}
                        @endif
                    </h2>

                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active" href="#">
                                @if (session()->get('lang') == 'english')
                                    More
                                @else
                                    আরও
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row gy-4">
                        @php

                            $forthcatsmallpost = App\Models\Post::where('status', 1)
                                ->where('category_id', $forthcategory->id)
                                ->where('bigthumbnail', 0)
                                ->latest('id')
                                ->select(
                                    'id',
                                    'category_id',
                                    'user_id',
                                    'title_en',
                                    'title_bn',
                                    'thumbnail',
                                    'created_at',
                                )
                                ->limit(4)
                                ->get();

                        @endphp
                        @foreach ($forthcatsmallpost as $forthsmallpost)
                            <div class="col-sm-6 col-xl-4">
                                <div class="blog-style1">
                                    <div class="blog-img"><img
                                            src="{{ asset('uploads/thumbnail') }}/{{ $forthsmallpost->thumbnail }}"
                                            alt="blog image"> <a
                                            data-theme-color="{{ $category_colors[$forthsmallpost->category->id] }}"
                                            href="#" class="category">
                                            @if (session()->get('lang') == 'english')
                                                {{ $forthsmallpost->category->category_name_en }}
                                            @else
                                                {{ $forthsmallpost->category->category_name_bn }}
                                            @endif
                                        </a></div>
                                    <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">
                                            @if (session()->get('lang') == 'english')
                                                {{ $forthsmallpost->title_en }}
                                            @else
                                                {{ $forthsmallpost->title_bn }}
                                            @endif
                                        </a></h3>
                                    <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                            {{ $forthsmallpost->user->name }}</a> <a href="blog.html"><i
                                                class="fal fa-calendar-days"></i>{{ $forthsmallpost->created_at->format('d M, Y') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>


















































    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="sec-title has-line"> @php
                                $sixthcategory = App\Models\Category::where('status', 1)
                                    ->select('id', 'category_name_en', 'category_name_bn')
                                    ->skip(5)
                                    ->first();
                            @endphp
                                @if (session()->get('lang') == 'english')
                                    {{ $sixthcategory->category_name_en }}
                                @else
                                    {{ $sixthcategory->category_name_bn }}
                                @endif
                            </h2>
                        </div>
                        <div class="col-auto">
                            <div class="sec-btn">
                                <div class="filter-menu filter-menu-active1"><a class="tab-btn active" href="#">
                                        @if (session()->get('lang') == 'english')
                                            More
                                        @else
                                            আরও
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-active">
                        @php

                            $sixthcatsmallpost = App\Models\Post::where('status', 1)
                                ->where('category_id', $sixthcategory->id)
                                ->latest('id')
                                ->select(
                                    'id',
                                    'category_id',
                                    'user_id',
                                    'title_en',
                                    'title_bn',
                                    'thumbnail',
                                    'details_en',
                                    'details_bn',
                                    'created_at',
                                )
                                ->limit(4)
                                ->get();

                        @endphp
                        @foreach ($sixthcatsmallpost as $sixthPost)
                            <div class="border-blog2 filter-item cat1">
                                <div class="blog-style4">
                                    <div class="blog-img"><img
                                            src="{{ asset('uploads/thumbnail') }}/{{ $sixthPost->thumbnail }}"
                                            alt="blog image">
                                    </div>
                                    <div class="blog-content"><a
                                            data-theme-color="{{ $category_colors[$sixthPost->category->id] }}"
                                            href="#" class="category">
                                            @if (session()->get('lang') == 'english')
                                                {{ $sixthPost->category->category_name_en }}
                                            @else
                                                {{ $sixthPost->category->category_name_bn }}
                                            @endif
                                        </a>
                                        <h3 class="box-title-24"><a class="hover-line" href="#">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $sixthPost->title_en }}
                                                @else
                                                    {{ $sixthPost->title_bn }}
                                                @endif
                                            </a></h3>
                                        <p class="blog-text">
                                            @if (session()->get('lang') == 'english')
                                                {!! Str::limit($sixthPost->details_en, 100, '...') !!}
                                            @else
                                                {!! Str::limit($sixthPost->details_bn, 100, '...') !!}
                                            @endif
                                        </p>
                                        <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                                {{ $sixthPost->user->name }}</a> <a href="blog.html"><i
                                                    class="fal fa-calendar-days"></i>{{ $sixthPost->created_at->format('d M, Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


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
                        <div class="widget mb-30">
                            <div class="widget-ads"><a href="https://themeforest.net/user/themeholy/portfolio"><img
                                        class="w-100" src="{{ asset('assets/frontend') }}/img/ads/siderbar_ads_1.jpg"
                                        alt="ads"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>














    <section class="space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @php
                            $fifthcategory = App\Models\Category::where('status', 1)
                                ->select('id', 'category_name_en', 'category_name_bn')
                                ->skip(4)
                                ->first();
                        @endphp
                        @if (session()->get('lang') == 'english')
                            {{ $fifthcategory->category_name_en }}
                        @else
                            {{ $fifthcategory->category_name_bn }}
                        @endif
                    </h2>
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

                @php

                    $fifthcatpost = App\Models\Post::where('status', 1)
                        ->where('category_id', $fifthcategory->id)
                        ->latest('id')
                        ->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'thumbnail', 'created_at')
                        ->limit(7)
                        ->get();

                @endphp

                @foreach ($fifthcatpost as $fifthpost)
                    <div class="col-sm-6 col-xl-4">
                        <div class="blog-style1">
                            <div class="blog-img"><img
                                    src="{{ asset('uploads/thumbnail') }}/{{ $fifthpost->thumbnail }}"
                                    alt="blog image"> <a
                                    data-theme-color="{{ $category_colors[$fifthpost->category->id] }}" href="#"
                                    class="category">
                                    @if (session()->get('lang') == 'english')
                                        {{ $fifthpost->category->category_name_en }}
                                    @else
                                        {{ $fifthpost->category->category_name_bn }}
                                    @endif
                                </a></div>
                            <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">
                                    @if (session()->get('lang') == 'english')
                                        {{ $fifthpost->title_en }}
                                    @else
                                        {{ $fifthpost->title_bn }}
                                    @endif
                                </a>
                            </h3>
                            <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                    {{ $fifthpost->user->name }}</a> <a href="#"><i
                                        class="fal fa-calendar-days"></i>{{ $fifthpost->created_at->format('d M, Y') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>














    <section class="space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @php
                            $seventhcategory = App\Models\Category::where('status', 1)
                                ->select('id', 'category_name_en', 'category_name_bn')
                                ->skip(6)
                                ->first();
                        @endphp
                        @if (session()->get('lang') == 'english')
                            {{ $seventhcategory->category_name_en }}
                        @else
                            {{ $seventhcategory->category_name_bn }}
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active" href="#">
                                @if (session()->get('lang') == 'english')
                                    More
                                @else
                                    আরও
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-30 filter-active" style="position: relative; height: 720px;">
                @php

                    $seventhcatpost = App\Models\Post::where('status', 1)
                        ->where('category_id', $seventhcategory->id)
                        ->latest('id')
                        ->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'thumbnail', 'created_at')
                        ->limit(7)
                        ->get();

                @endphp

                @foreach ($seventhcatpost as $seventhpost)
                    <div class="col-lg-6 two-column filter-item cat1" style="position: absolute; left: 0px; top: 0px;">
                        <div class="blog-style4">
                            <div class="blog-img"><img
                                    src="{{ asset('uploads/thumbnail') }}/{{ $seventhpost->thumbnail }}"
                                    alt="blog image"></div>
                            <div class="blog-content"><a href="#" class="category"
                                    style="--theme-color:{{ $category_colors[$seventhpost->category->id] }} ;">
                                    @if (session()->get('lang') == 'english')
                                        {{ $seventhpost->category->category_name_en }}
                                    @else
                                        {{ $seventhpost->category->category_name_bn }}
                                    @endif
                                </a>
                                <h3 class="box-title-22"><a class="hover-line" href="#">
                                        @if (session()->get('lang') == 'english')
                                            {{ $seventhpost->title_en }}
                                        @else
                                            {{ $seventhpost->title_bn }}
                                        @endif
                                    </a></h3>
                                <div class="blog-meta"><a href="author.html"><i class="far fa-user"></i>By -
                                        {{ $seventhpost->user->name }}</a> <a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $seventhpost->created_at->format('d M, Y') }}</a>
                                </div><a href="#" class="th-btn style2">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>



















































    <div class="space dark-theme bg-title-dark">
        <div class="container">
            <h2 class="sec-title has-line">
                @if (session()->get('lang') == 'english')
                    Video Gallery
                @else
                    ভিডিও গ্যালারি
                @endif
            </h2>
            <div class="row">
                <div class="col-xl-4 col-lg-2">
                    <div class="blog-tab" data-asnavfor=".blog-tab-slide">
                        @php

                            $videos = App\Models\Video::where('status', 1)
                                ->latest('id')
                                ->select('id', 'title_en', 'title_bn', 'title_en', 'thumbnail', 'created_at')
                                ->limit(4)
                                ->get();

                        @endphp
                        @foreach ($videos as $video)
                            <div class="tab-btn active">
                                <div class="blog-style2">
                                    <div class="blog-img img-100"><img
                                            src="{{ asset('uploads/video-gallery') }}/{{ $video->thumbnail }}"
                                            alt="blog image">
                                        <div class="icon"><i class="fal fa-waveform-lines"></i></div><a
                                            href="{{ $video->video_link }}" class="play-btn popup-video"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="box-title-20"><a class="hover-line" href="#">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $video->title_en }}
                                                @else
                                                    {{ $video->title_bn }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="blog-meta"><a href="#"><i
                                                    class="fal fa-calendar-days"></i>{{ $video->created_at->format('d M, Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

                <div class="col-xl-8 col-lg-10">
                    <div class="blog-tab-slide th-carousel" data-fade="true" data-slide-show="1" data-md-slide-show="1">
                        @foreach ($videos as $video)
                            <div class="">
                                <div class="blog-style8">
                                    <div class="blog-img"><img
                                            src="{{ asset('uploads/video-gallery') }}/{{ $video->thumbnail }}"
                                            alt="blog image"> <a href="{{ $video->video_link }}"
                                            class="play-btn popup-video"><i class="fas fa-play"></i></a></div>
                                    <h3 class="box-title-30"><a class="hover-line" href="#">
                                            @if (session()->get('lang') == 'english')
                                                {{ $video->title_en }}
                                            @else
                                                {{ $video->title_bn }}
                                            @endif
                                        </a></h3>
                                    <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By
                                            - </a> <a href="blog.html"><i
                                                class="fal fa-calendar-days"></i>{{ $video->created_at->format('d M, Y') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>







































    <section class="space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @if (session()->get('lang') == 'english')
                            Country
                        @else
                            সারাদেশ
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active" href="#">
                                @if (session()->get('lang') == 'english')
                                    More
                                @else
                                    আরও
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-24 filter-active mbn-24" style="position: relative; height: 447.15px;">

                <div class="col-xl-4 col-md-6 filter-item cat1" style="position: absolute; left: 0px; top: 0px;">
                    <div class="blog-style3 dark-theme">
                        <div class="blog-img"><img
                                src="{{ asset('uploads/thumbnail') }}/{{ $countriesBig->thumbnail }}"
                                alt="blog image"></div>
                        <div class="blog-content"><a href="#" class="category"
                                style="--theme-color: {{ $category_colors[$countriesBig->category->id] }};">
                                @if (session()->get('lang') == 'english')
                                    {{ $countriesBig->category->category_name_en }}
                                @else
                                    {{ $countriesBig->category->category_name_bn }}
                                @endif
                            </a>
                            <h3 class="box-title-24"><a class="hover-line" href="#">
                                    @if (session()->get('lang') == 'english')
                                        {{ $countriesBig->title_en }}
                                    @else
                                        {{ $countriesBig->title_bn }}
                                    @endif
                                </a></h3>
                            <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                    {{ $countriesBig->user->name }}</a> <a href="#"><i
                                        class="fal fa-calendar-days"></i>{{ $countriesBig->created_at->format('d M, Y') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($countriesSmall as $countrySmall)
                    <div class="col-xl-4 col-md-6 filter-item cat1"
                        style="position: absolute; left: 424.667px; top: 0px;">
                        <div class="blog-style2">
                            <div class="blog-img img-big"><img
                                    src="{{ asset('uploads/thumbnail') }}/{{ $countrySmall->thumbnail }}"
                                    alt="blog image"></div>
                            <div class="blog-content"><a href="#" class="category"
                                    style="--theme-color: {{ $category_colors[$countrySmall->category->id] }};">
                                    @if (session()->get('lang') == 'english')
                                        {{ $countrySmall->category->category_name_en }}
                                    @else
                                        {{ $countrySmall->category->category_name_bn }}
                                    @endif
                                </a>
                                <h3 class="box-title-20"><a class="hover-line" href="#">
                                        @if (session()->get('lang') == 'english')
                                            {{ $countrySmall->title_en }}
                                        @else
                                            {{ $countrySmall->title_bn }}
                                        @endif
                                    </a></h3>
                                <div class="blog-meta"><a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $countrySmall->created_at->format('d M, Y') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
@push('script')
@endpush
