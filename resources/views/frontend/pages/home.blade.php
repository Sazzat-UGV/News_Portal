@extends('frontend.layouts.master')
@section('title')
    Home
@endsection
@push('style')
@endpush
@section('content')
@php
        $categories = App\Models\Category::select('id')->get();
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
                    $category_colors[$category->id] = '#FF6500';
                    break;
                default:
                    $category_colors[$category->id] = '#59C2D6';
                    break;
            }
        }
    @endphp

    <div>
        {{-- breaking news section start --}}
        <div class="container">
            <div class="news-area">
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
        {{-- breaking news section end --}}

        {{-- notice section start --}}
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
        {{-- notice section end --}}
    </div>

    <section class="space">
        <div class="container">
            <div class="row">

                {{-- firstsection start --}}
                <div class="col-xl-3">
                    <div class="row ">
                        @foreach ($first_sections as $first_section)
                            <div class="col-xl-12 col-sm-6 border-blog dark-theme img-overlay2">
                                <div class="blog-style3">
                                    <div class="blog-img"><img
                                            src="{{ asset('uploads/thumbnail') }}/{{ $first_section->thumbnail }}"
                                            alt="news image">
                                    </div>
                                    <div class="blog-content"><a
                                            data-theme-color="{{ $category_colors[$first_section->category->id] }}"
                                            href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $first_section->category->category_name_slug_en]) }}
                                        @else
                                        {{ route('post.categoryAll', ['slug' => $first_section->category->category_name_slug_bn]) }} @endif"
                                            class="category">
                                            @if (session()->get('lang') == 'english')
                                                {{ $first_section->category->category_name_en }}
                                            @else
                                                {{ $first_section->category->category_name_bn }}
                                            @endif
                                        </a>
                                        <h3 class="box-title-22"><a class="hover-line"
                                                href="

                                            @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $first_section->title_slug_en]) }}
                                            @else
                                            {{ route('post.detail', ['slug' => $first_section->title_slug_bn]) }} @endif">
                                                @if (session()->get('lang') == 'english')
                                                    {{ Str::limit($first_section->title_en, 40, '') }}
                                                @else
                                                    {{ Str::limit($first_section->title_bn, 40, '') }}
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
                {{-- firstsection end --}}

                {{-- firstsection big thumbnail start --}}
                <div class="col-xl-6 mt-4 mt-xl-0">
                    <div class="dark-theme img-overlay2">
                        <div class="blog-style3">
                            <div class="blog-img"><img
                                    src="{{ asset('uploads/thumbnail') }}/{{ $firstSectionBigThumbnail->thumbnail }}"
                                    alt="news image"></div>
                            <div class="blog-content"><a
                                    data-theme-color=" {{ $category_colors[$firstSectionBigThumbnail->category->id] }}"
                                    href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $firstSectionBigThumbnail->category->category_name_slug_en]) }}
                                @else
                                {{ route('post.categoryAll', ['slug' => $firstSectionBigThumbnail->category->category_name_slug_bn]) }} @endif"
                                    class="category">
                                    @if (session()->get('lang') == 'english')
                                        {{ $firstSectionBigThumbnail->category->category_name_en }}
                                    @else
                                        {{ $firstSectionBigThumbnail->category->category_name_bn }}
                                    @endif
                                </a>
                                <h3 class="box-title-30"><a class="hover-line"
                                        href="

                                    @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $firstSectionBigThumbnail->title_slug_en]) }}
                                    @else
                                    {{ route('post.detail', ['slug' => $firstSectionBigThumbnail->title_slug_bn]) }} @endif">
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
                {{-- firstsection big thumbnail end --}}

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

                        {{-- favourite post start --}}
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
                                                    href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $favourite->category->category_name_slug_en]) }}
                                                @else
                                                {{ route('post.categoryAll', ['slug' => $favourite->category->category_name_slug_bn]) }} @endif"
                                                    class="category">
                                                    @if (session()->get('lang') == 'english')
                                                        {{ $favourite->category->category_name_en }}
                                                    @else
                                                        {{ $favourite->category->category_name_bn }}
                                                    @endif
                                                </a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="

                                                    @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $favourite->title_slug_en]) }}
                                                    @else
                                                    {{ route('post.detail', ['slug' => $favourite->title_slug_bn]) }} @endif">
                                                        @if (session()->get('lang') == 'english')
                                                            {{ Str::limit($favourite->title_en, 50, ' ') }}
                                                        @else
                                                            {{ Str::limit($favourite->title_bn, 50, ' ') }}
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
                        {{-- favourite post end --}}

                        {{-- recent news end --}}
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
                                                    href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $recent->category->category_name_slug_en]) }}
                                                @else
                                                {{ route('post.categoryAll', ['slug' => $recent->category->category_name_slug_bn]) }} @endif"
                                                    class="category">
                                                    @if (session()->get('lang') == 'english')
                                                        {{ $recent->category->category_name_en }}
                                                    @else
                                                        {{ $recent->category->category_name_bn }}
                                                    @endif
                                                </a>
                                                <h3 class="box-title-18"><a class="hover-line"
                                                        href="@if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $recent->title_slug_en]) }}
                                                    @else
                                                    {{ route('post.detail', ['slug' => $recent->title_slug_bn]) }} @endif">
                                                        @if (session()->get('lang') == 'english')
                                                            {{ Str::limit($recent->title_en, 50, '') }}
                                                        @else
                                                            {{ Str::limit($recent->title_bn, 50, '') }}
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

    {{-- first category start --}}
    <div class="mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @if (session()->get('lang') == 'english')
                            {{ $firstcategory->category_name_en }}
                        @else
                            {{ $firstcategory->category_name_bn }}
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active"
                                href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $firstcategory->category_name_slug_en]) }}
                        @else
                        {{ route('post.categoryAll', ['slug' => $firstcategory->category_name_slug_bn]) }} @endif">
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

                                <div class="blog-img"><img
                                        src="{{ asset('uploads/thumbnail') }}/{{ $firstcategorybigpost->thumbnail }}"
                                        alt="news image"> <a
                                        data-theme-color="{{ $category_colors[$firstcategorybigpost->category->id] }}"
                                        href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $firstcategorybigpost->category->category_name_slug_en]) }}
                                    @else
                                    {{ route('post.categoryAll', ['slug' => $firstcategorybigpost->category->category_name_slug_bn]) }} @endif"
                                        class="category">
                                        @if (session()->get('lang') == 'english')
                                            {{ $firstcategorybigpost->category->category_name_en }}
                                        @else
                                            {{ $firstcategorybigpost->category->category_name_bn }}
                                        @endif
                                    </a>
                                </div>
                                <h3 class="box-title-30"><a class="hover-line"
                                        href="

                                    @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $firstcategorybigpost->title_slug_en]) }}
                                    @else
                                    {{ route('post.detail', ['slug' => $firstcategorybigpost->title_slug_bn]) }} @endif">
                                        @if (session()->get('lang') == 'english')
                                            {{ Str::limit($firstcategorybigpost->title_en, 100, '') }}
                                        @else
                                            {{ Str::limit($firstcategorybigpost->title_bn, 100, '') }}
                                        @endif
                                    </a>
                                </h3>
                                <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                        {{ $firstcategorybigpost->user->name }}</a> <a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $firstcategorybigpost->created_at->format('d M, Y') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="row gy-4">
                            @foreach ($firstcategorysmallpost as $firstsmallpost)
                                <div class="col-xl-6 col-sm-6 border-blog two-column">
                                    <div class="blog-style1">
                                        <div class="blog-img"><img
                                                src="{{ asset('uploads/thumbnail') }}/{{ $firstsmallpost->thumbnail }}"
                                                alt="news image"> <a
                                                data-theme-color="{{ $category_colors[$firstsmallpost->category->id] }}"
                                                href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $firstsmallpost->category->category_name_slug_en]) }}
                                            @else
                                            {{ route('post.categoryAll', ['slug' => $firstsmallpost->category->category_name_slug_bn]) }} @endif"
                                                class="category">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $firstsmallpost->category->category_name_en }}
                                                @else
                                                    {{ $firstsmallpost->category->category_name_bn }}
                                                @endif
                                            </a>
                                        </div>
                                        <h3 class="box-title-22"><a class="hover-line"
                                                href="
                                            @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $firstsmallpost->title_slug_en]) }}
                                            @else
                                            {{ route('post.detail', ['slug' => $firstsmallpost->title_slug_bn]) }} @endif">
                                                @if (session()->get('lang') == 'english')
                                                    {{ Str::limit($firstsmallpost->title_en, 50, '') }}
                                                @else
                                                    {{ Str::limit($firstsmallpost->title_bn, 50, '') }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
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
    {{-- first category end --}}
@if (isset($ads1))
<div class="container"><a href="{{ $ads1->link }}" target="blank"><img
            src="{{ asset('uploads/ads') }}/{{ $ads1->ads }}" alt="ads" class="w-100"></a></div>
@endif

    {{-- second category start --}}
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @if (session()->get('lang') == 'english')
                            {{ $secondcategory->category_name_en }}
                        @else
                            {{ $secondcategory->category_name_bn }}
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active"
                                href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $secondcategory->category_name_slug_en]) }}
                        @else
                        {{ route('post.categoryAll', ['slug' => $secondcategory->category_name_slug_bn]) }} @endif">
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
                        @foreach ($secondcategorypost as $secondcatpost)
                            <div class="col-sm-6 col-xl-4">
                                <div class="blog-style1">
                                    <div class="blog-img"><img
                                            src="{{ asset('uploads/thumbnail') }}/{{ $secondcatpost->thumbnail }}"
                                            alt="news image"> <a
                                            data-theme-color="{{ $category_colors[$secondcatpost->category->id] }}"
                                            href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $secondcatpost->category->category_name_slug_en]) }}
                                        @else
                                        {{ route('post.categoryAll', ['slug' => $secondcatpost->category->category_name_slug_bn]) }} @endif"
                                            class="category">
                                            @if (session()->get('lang') == 'english')
                                                {{ $secondcatpost->category->category_name_en }}
                                            @else
                                                {{ $secondcatpost->category->category_name_bn }}
                                            @endif
                                        </a></div>
                                    <h3 class="box-title-22"><a class="hover-line"
                                            href="

                                        @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $secondcatpost->title_slug_en]) }}
                                        @else
                                        {{ route('post.detail', ['slug' => $secondcatpost->title_slug_bn]) }} @endif">
                                            @if (session()->get('lang') == 'english')
                                                {{ Str::limit($secondcatpost->title_en, 100, '') }}
                                            @else
                                                {{ Str::limit($secondcatpost->title_bn, 100, '') }}
                                            @endif
                                        </a></h3>
                                    <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                            {{ $secondcatpost->user->name }}</a> <a href="#"><i
                                                class="fal fa-calendar-days"></i>{{ $secondcatpost->created_at->format('d M, Y') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- second category end --}}


    {{-- third category start --}}
    <div class="mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @if (session()->get('lang') == 'english')
                            {{ $thirdcategory->category_name_en }}
                        @else
                            {{ $thirdcategory->category_name_bn }}
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active"
                                href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $thirdcategory->category_name_slug_en]) }}
                        @else
                        {{ route('post.categoryAll', ['slug' => $thirdcategory->category_name_slug_bn]) }} @endif">
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
                                <div class="blog-img"><img
                                        src="{{ asset('uploads/thumbnail') }}/{{ $thirdcategorybigpost->thumbnail }}"
                                        alt="news image"> <a
                                        data-theme-color="{{ $category_colors[$thirdcategorybigpost->category->id] }}"
                                        href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $thirdcategorybigpost->category->category_name_slug_en]) }}
                                    @else
                                    {{ route('post.categoryAll', ['slug' => $thirdcategorybigpost->category->category_name_slug_bn]) }} @endif"
                                        class="category">
                                        @if (session()->get('lang') == 'english')
                                            {{ $thirdcategorybigpost->category->category_name_en }}
                                        @else
                                            {{ $thirdcategorybigpost->category->category_name_bn }}
                                        @endif
                                    </a>
                                </div>
                                <h3 class="box-title-30"><a class="hover-line"
                                        href="
                                    @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $thirdcategorybigpost->title_slug_en]) }}
                                    @else
                                    {{ route('post.detail', ['slug' => $thirdcategorybigpost->title_slug_bn]) }} @endif">
                                        @if (session()->get('lang') == 'english')
                                            {{ Str::limit($thirdcategorybigpost->title_en, 100, '') }}
                                        @else
                                            {{ Str::limit($thirdcategorybigpost->title_bn, 100, '') }}
                                        @endif
                                    </a>
                                </h3>
                                <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                        {{ $thirdcategorybigpost->user->name }}</a> <a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $thirdcategorybigpost->created_at->format('d M, Y') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="row gy-4">
                            @foreach ($thirdcategorysmallpost as $thirdsmallpost)
                                <div class="col-xl-6 col-sm-6 border-blog two-column">
                                    <div class="blog-style1">
                                        <div class="blog-img"><img
                                                src="{{ asset('uploads/thumbnail') }}/{{ $thirdsmallpost->thumbnail }}"
                                                alt="news image"> <a
                                                data-theme-color="{{ $category_colors[$thirdsmallpost->category->id] }}"
                                                href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $thirdsmallpost->category->category_name_slug_en]) }}
                                            @else
                                            {{ route('post.categoryAll', ['slug' => $thirdsmallpost->category->category_name_slug_bn]) }} @endif"
                                                class="category">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $thirdsmallpost->category->category_name_en }}
                                                @else
                                                    {{ $thirdsmallpost->category->category_name_bn }}
                                                @endif
                                            </a>
                                        </div>
                                        <h3 class="box-title-22"><a class="hover-line"
                                                href="@if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $thirdsmallpost->title_slug_en]) }}
                                            @else
                                            {{ route('post.detail', ['slug' => $thirdsmallpost->title_slug_bn]) }} @endif">
                                                @if (session()->get('lang') == 'english')
                                                    {{ Str::limit($thirdsmallpost->title_en, 50, '') }}
                                                @else
                                                    {{ Str::limit($thirdsmallpost->title_bn, 50, '') }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
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
    {{-- third category end --}}

    @if (isset($ads2))
    <div class="container"><a href="{{ $ads2->link }}" target="blank"><img
                src="{{ asset('uploads/ads') }}/{{ $ads2->ads }}" alt="ads" class="w-100"></a></div>
    @endif

    {{-- forth category start --}}
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @if (session()->get('lang') == 'english')
                            {{ $forthcategory->category_name_en }}
                        @else
                            {{ $forthcategory->category_name_bn }}
                        @endif
                    </h2>

                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active"
                                href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $forthcategory->category_name_slug_en]) }}
                        @else
                        {{ route('post.categoryAll', ['slug' => $forthcategory->category_name_slug_bn]) }} @endif">
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
                        @foreach ($forthcategorypost as $forthcatpost)
                            <div class="col-sm-6 col-xl-4">
                                <div class="blog-style1">
                                    <div class="blog-img"><img
                                            src="{{ asset('uploads/thumbnail') }}/{{ $forthcatpost->thumbnail }}"
                                            alt="news image"> <a
                                            data-theme-color="{{ $category_colors[$forthcatpost->category->id] }}"
                                            href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $forthcatpost->category->category_name_slug_en]) }}
                                        @else
                                        {{ route('post.categoryAll', ['slug' => $forthcatpost->category->category_name_slug_bn]) }} @endif"
                                            class="category">
                                            @if (session()->get('lang') == 'english')
                                                {{ $forthcatpost->category->category_name_en }}
                                            @else
                                                {{ $forthcatpost->category->category_name_bn }}
                                            @endif
                                        </a></div>
                                    <h3 class="box-title-22"><a class="hover-line"
                                            href="

                                        @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $forthcatpost->title_slug_en]) }}
                                        @else
                                        {{ route('post.detail', ['slug' => $forthcatpost->title_slug_bn]) }} @endif">
                                            @if (session()->get('lang') == 'english')
                                                {{ Str::limit($forthcatpost->title_en, 50, '') }}
                                            @else
                                                {{ Str::limit($forthcatpost->title_bn, 50, '') }}
                                            @endif
                                        </a></h3>
                                    <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                            {{ $forthcatpost->user->name }}</a> <a href="#"><i
                                                class="fal fa-calendar-days"></i>{{ $forthcatpost->created_at->format('d M, Y') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- forth category end --}}

    {{-- fifth category start --}}
    <section class="space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">
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
                @foreach ($fifthcategorypost as $fifthcatpost)
                    <div class="col-sm-6 col-xl-4">
                        <div class="blog-style1">
                            <div class="blog-img"><img
                                    src="{{ asset('uploads/thumbnail') }}/{{ $fifthcatpost->thumbnail }}"
                                    alt="news image">
                                <a data-theme-color="{{ $category_colors[$fifthcatpost->category->id] }}"
                                    href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $fifthcatpost->category->category_name_slug_en]) }}
                                @else
                                {{ route('post.categoryAll', ['slug' => $fifthcatpost->category->category_name_slug_bn]) }} @endif"
                                    class="category">
                                    @if (session()->get('lang') == 'english')
                                        {{ $fifthcatpost->category->category_name_en }}
                                    @else
                                        {{ $fifthcatpost->category->category_name_bn }}
                                    @endif
                                </a>
                            </div>
                            <h3 class="box-title-22"><a class="hover-line"
                                    href="

                                @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $fifthcatpost->title_slug_en]) }}
                                @else
                                {{ route('post.detail', ['slug' => $fifthcatpost->title_slug_bn]) }} @endif">
                                    @if (session()->get('lang') == 'english')
                                        {{ Str::limit($fifthcatpost->title_en, 50, '') }}
                                    @else
                                        {{ Str::limit($fifthcatpost->title_bn, 50, '') }}
                                    @endif
                                </a>
                            </h3>
                            <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                    {{ $fifthcatpost->user->name }}</a> <a href="#"><i
                                        class="fal fa-calendar-days"></i>{{ $fifthcatpost->created_at->format('d M, Y') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- fifth category end --}}

    {{-- sixth category start --}}
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="sec-title has-line">
                                @if (session()->get('lang') == 'english')
                                    {{ $sixthcategory->category_name_en }}
                                @else
                                    {{ $sixthcategory->category_name_bn }}
                                @endif
                            </h2>
                        </div>
                        <div class="col-auto">
                            <div class="sec-btn">
                                <div class="filter-menu filter-menu-active1"><a class="tab-btn active"
                                        href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $sixthcategory->category_name_slug_en]) }}
                                @else
                                {{ route('post.categoryAll', ['slug' => $sixthcategory->category_name_slug_bn]) }} @endif">
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
                        @foreach ($sixthcategorypost as $sixthpost)
                            <div class="border-blog2 filter-item cat1">
                                <div class="blog-style4">
                                    <div class="blog-img"><img
                                            src="{{ asset('uploads/thumbnail') }}/{{ $sixthpost->thumbnail }}"
                                            alt="news image">
                                    </div>
                                    <div class="blog-content"><a
                                            data-theme-color="{{ $category_colors[$sixthpost->category->id] }}"
                                            href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $sixthpost->category->category_name_slug_en]) }}
                                        @else
                                        {{ route('post.categoryAll', ['slug' => $sixthpost->category->category_name_slug_bn]) }} @endif"
                                            class="category">
                                            @if (session()->get('lang') == 'english')
                                                {{ $sixthpost->category->category_name_en }}
                                            @else
                                                {{ $sixthpost->category->category_name_bn }}
                                            @endif
                                        </a>
                                        <h3 class="box-title-24"><a class="hover-line"
                                                href="
                                            @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $sixthpost->title_slug_en]) }}
                                            @else
                                            {{ route('post.detail', ['slug' => $sixthpost->title_slug_bn]) }} @endif">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $sixthpost->title_en }}
                                                @else
                                                    {{ $sixthpost->title_bn }}
                                                @endif
                                            </a></h3>
                                        <p class="blog-text">
                                            @if (session()->get('lang') == 'english')
                                                {!! Str::limit($sixthpost->details_en, 200, '') !!}
                                            @else
                                                {!! Str::limit($sixthpost->details_bn, 200, '') !!}
                                            @endif
                                        </p>
                                        <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                                {{ $sixthpost->user->name }}</a> <a href="#"><i
                                                    class="fal fa-calendar-days"></i>{{ $sixthpost->created_at->format('d M, Y') }}</a>
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
                            @if (isset($ads3))
                            <div class="widget-ads"><a href="{{ $ads3->link }}" target="blank"><img
                                class="w-100" src="{{ asset('uploads/ads') }}/{{ $ads3->ads }}"
                                alt="ads"></a>
                            </div>
                            @endif
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

                        @if ($prayerTime->active == 1)
                            <div class="widget mb-30">
                                @if (session()->get('lang') == 'english')
                                    <div class="text-center text-white py-1 text-bold mb-1"
                                        style="background-color: #FF1D50; font-weight: 600">Prayer Time</div>
                                @else
                                    <div class="text-center text-white py-1 text-bold mb-1"
                                        style="background-color: #FF1D50; font-weight: 600">নামাজের সময়সুচি</div>
                                @endif
                                <table>
                                    <tr>
                                        <th>
                                            @if (session()->get('lang') == 'english')
                                                Fajr
                                            @else
                                                ফজর
                                            @endif
                                        </th>
                                        <td>{{ $prayerTime->fajr }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            @if (session()->get('lang') == 'english')
                                                Dhuhr
                                            @else
                                                যোহর
                                            @endif
                                        </th>
                                        <td>{{ $prayerTime->dhuhr }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            @if (session()->get('lang') == 'english')
                                                Asr
                                            @else
                                                আসর
                                            @endif
                                        </th>
                                        <td>{{ $prayerTime->asr }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            @if (session()->get('lang') == 'english')
                                                Maghrib
                                            @else
                                                মাগরিব
                                            @endif
                                        </th>
                                        <td>{{ $prayerTime->maghrib }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            @if (session()->get('lang') == 'english')
                                                Isha'a
                                            @else
                                                ইশা
                                            @endif
                                        </th>
                                        <td>{{ $prayerTime->isha_a }}</td>
                                    </tr>
                                    <tr>
                                        <th>
                                            @if (session()->get('lang') == 'english')
                                                Jumu'ah
                                            @else
                                                জুমা
                                            @endif
                                        </th>
                                        <td>{{ $prayerTime->jumu_ah }}</td>
                                    </tr>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </section>
    {{-- sixth category end --}}

    @if (isset($ads4))
    <div class="container"><a href="{{ $ads4->link }}" target="blank"><img
        src="{{ asset('uploads/ads') }}/{{ $ads4->ads }}" alt="ads" class="w-100"></a></div>
    @endif


    {{-- seventh category start --}}
    <section class="space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">
                        @if (session()->get('lang') == 'english')
                            {{ $seventhcategory->category_name_en }}
                        @else
                            {{ $seventhcategory->category_name_bn }}
                        @endif
                    </h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active"
                                href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $seventhcategory->category_name_slug_en]) }}
                        @else
                        {{ route('post.categoryAll', ['slug' => $seventhcategory->category_name_slug_bn]) }} @endif">
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

                @foreach ($seventhcategorypost as $seventcathpost)
                    <div class="col-lg-6 two-column filter-item cat1" style="position: absolute; left: 0px; top: 0px;">
                        <div class="blog-style4">
                            <div class="blog-img"><img
                                    src="{{ asset('uploads/thumbnail') }}/{{ $seventcathpost->thumbnail }}"
                                    alt="news image"></div>
                            <div class="blog-content"><a
                                    href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $seventcathpost->category->category_name_slug_en]) }}
                            @else
                            {{ route('post.categoryAll', ['slug' => $seventcathpost->category->category_name_slug_bn]) }} @endif"
                                    class="category"
                                    style="--theme-color:{{ $category_colors[$seventcathpost->category->id] }} ;">
                                    @if (session()->get('lang') == 'english')
                                        {{ $seventcathpost->category->category_name_en }}
                                    @else
                                        {{ $seventcathpost->category->category_name_bn }}
                                    @endif
                                </a>
                                <h3 class="box-title-22"><a class="hover-line"
                                        href="

                                    @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $seventcathpost->title_slug_en]) }}
                                    @else
                                    {{ route('post.detail', ['slug' => $seventcathpost->title_slug_bn]) }} @endif">
                                        @if (session()->get('lang') == 'english')
                                            {{ Str::limit($seventcathpost->title_en, 50, '') }}
                                        @else
                                            {{ Str::limit($seventcathpost->title_bn, 50, '') }}
                                        @endif
                                    </a></h3>
                                <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                        {{ $seventcathpost->user->name }}</a> <a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $seventcathpost->created_at->format('d M, Y') }}</a>
                                </div><a
                                    href="
                                @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $seventcathpost->title_slug_en]) }}
                                @else
                                {{ route('post.detail', ['slug' => $seventcathpost->title_slug_bn]) }} @endif"
                                    class="th-btn style2">
                                    @if (session()->get('lang') == 'english')
                                        Read More
                                    @else
                                        আরও পড়ুন
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- seventh category end --}}

    {{-- video gallery start --}}
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
                        @foreach ($videos as $video)
                            <div class="tab-btn active">
                                <div class="blog-style2">
                                    <div class="blog-img img-100"><img
                                            src="{{ asset('uploads/video-gallery') }}/{{ $video->thumbnail }}"
                                            alt="news image">
                                        <div class="icon"><i class="fal fa-waveform-lines"></i></div><a
                                            href="{{ $video->video_link }}" class="play-btn popup-video"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="box-title-20"><a class="hover-line" href="#">
                                                @if (session()->get('lang') == 'english')
                                                    {{ Str::limit($video->title_en, 50, '') }}
                                                @else
                                                    {{ Str::limit($video->title_bn, 50, '') }}
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
                                            alt="news image"> <a href="{{ $video->video_link }}"
                                            class="play-btn popup-video"><i class="fas fa-play"></i></a></div>
                                    <h3 class="box-title-30"><a class="hover-line" href="#">
                                            @if (session()->get('lang') == 'english')
                                                {{ Str::limit($video->title_en, 200, '') }}
                                            @else
                                                {{ Str::limit($video->title_bn, 200, '') }}
                                            @endif
                                        </a></h3>
                                    <div class="blog-meta"></a> <a href="#"><i
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
    {{-- video gallery end --}}

    {{-- all countries start --}}
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
                        <div class="filter-menu filter-menu-active1"><a class="tab-btn active"
                                href="{{ route('post.countryAll') }}">
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

                @foreach ($allcountries as $country)
                    <div class="col-xl-4 col-md-6 filter-item cat1"
                        style="position: absolute; left: 424.667px; top: 0px;">
                        <div class="blog-style2">
                            <div class="blog-img img-big"><img
                                    src="{{ asset('uploads/thumbnail') }}/{{ $country->thumbnail }}" alt="news image">
                            </div>
                            <div class="blog-content"><a
                                    href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $country->category->category_name_slug_en]) }}
                            @else
                            {{ route('post.categoryAll', ['slug' => $country->category->category_name_slug_bn]) }} @endif
"
                                    class="category"
                                    style="--theme-color: {{ $category_colors[$country->category->id] }};">
                                    @if (session()->get('lang') == 'english')
                                        {{ $country->category->category_name_en }}
                                    @else
                                        {{ $country->category->category_name_bn }}
                                    @endif
                                </a>
                                <h3 class="box-title-20"><a class="hover-line"
                                        href="

                                    @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $country->title_slug_en]) }}
                                    @else
                                    {{ route('post.detail', ['slug' => $country->title_slug_bn]) }} @endif">
                                        @if (session()->get('lang') == 'english')
                                            {{ Str::limit($country->title_en, 50, '') }}
                                        @else
                                            {{ Str::limit($country->title_bn, 50, '') }}
                                        @endif
                                    </a></h3>
                                <div class="blog-meta"><a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $country->created_at->format('d M, Y') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- all countries end --}}


@endsection
@push('script')
@endpush
