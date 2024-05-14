@extends('frontend.layouts.master')
@section('title')
    Tags
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
                    $category_colors[$category->id] = '#4E4BD0';
                    break;
                default:
                    $category_colors[$category->id] = '#59C2D6';
                    break;
            }
        }
    @endphp

    <section class="th-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row">

                {{-- post section start --}}
                <div class="col-xxl-9 col-lg-8">
                    @foreach ($search_results as $result)
                        <div class="th-blog blog-single has-post-thumbnail">
                            <div class="blog-img"><a
                                    href="@if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $result->title_slug_en]) }}
                        @else
                        {{ route('post.detail', ['slug' => $result->title_slug_bn]) }} @endif"><img
                                        src="{{ asset('uploads/thumbnail') }}/{{ $result->thumbnail }}"
                                        alt="news Image"></a><a
                                    data-theme-color="{{ $category_colors[$result->category->id] }}"
                                    href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $result->category->category_name_slug_en]) }}
                                    @else
                                    {{ route('post.categoryAll', ['slug' => $result->category->category_name_slug_bn]) }} @endif"
                                    class="category">
                                    @if (session()->get('lang') == 'english')
                                        {{ $result->category->category_name_en }}
                                    @else
                                        {{ $result->category->category_name_bn }}
                                    @endif
                                </a></div>
                            <div class="blog-content">
                                <div class="blog-meta"><a class="author" href="#"><i class="far fa-user"></i>By -
                                        {{ $result->user->name }}</a> <a href="#"><i
                                            class="fal fa-calendar-days"></i>{{ $result->created_at->format('d M, Y') }}</a>

                                    <a href="#"><i class="far fa-tags"></i>
                                        @if (session()->get('lang') == 'english')
                                            {{ $result->tags_en }}
                                        @else
                                            {{ $result->tags_bn }}
                                        @endif
                                    </a>
                                </div>
                                <h2 class="blog-title box-title-30"><a
                                        href="@if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $result->title_slug_en]) }}
                            @else
                            {{ route('post.detail', ['slug' => $result->title_slug_bn]) }} @endif">
                                        @if (session()->get('lang') == 'english')
                                            {{ $result->title_en }}
                                        @else
                                            {{ $result->title_bn }}
                                        @endif
                                    </a></h2>
                                <a href="@if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $result->title_slug_en]) }}
                            @else
                            {{ route('post.detail', ['slug' => $result->title_slug_bn]) }} @endif"
                                    class="th-btn style2">
                                    @if (session()->get('lang') == 'english')
                                        Read More
                                    @else
                                        আরও পড়ুন
                                    @endif
                                    <i class="fas fa-arrow-up-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <div class="th-pagination mt-40 mb-0 d-flex justify-content-center">
                        {{ $search_results->links('vendor.pagination.custom') }}
                    </div>
                </div>
                {{-- post section end --}}

                <div class="col-xxl-3 col-lg-4 sidebar-wrap">
                    <aside class="sidebar-area">
                        {{-- recent news start --}}
                        <div class="widget">
                            <h3 class="widget_title">
                                @if (session()->get('lang') == 'english')
                                    Recent News
                                @else
                                    সাম্প্রতিক খবর
                                @endif
                            </h3>
                            <div class="recent-post-wrap">

                                @foreach ($recent_news as $recent)
                                    <div class="recent-post">
                                        <div class="media-img"><a
                                                href="@if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $recent->title_slug_en]) }}
                                                        @else
                                                        {{ route('post.detail', ['slug' => $recent->title_slug_bn]) }} @endif"><img
                                                    src="{{ asset('uploads/thumbnail') }}/{{ $recent->thumbnail }}"
                                                    alt="News Image"></a></div>
                                        <div class="media-body">
                                            <h4 class="post-title mb-0"><a class="hover-line"
                                                    href="@if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $recent->title_slug_en]) }}
                                                        @else
                                                        {{ route('post.detail', ['slug' => $recent->title_slug_bn]) }} @endif">
                                                    @if (session()->get('lang') == 'english')
                                                        {{ Str::limit($recent->title_en, 70, '') }}
                                                    @else
                                                        {{ Str::limit($recent->title_bn, 70, '') }}
                                                    @endif
                                                </a></h4>
                                            <div class="recent-post-meta"><a href="#"><i
                                                        class="fal fa-calendar-days"></i>{{ $recent->created_at->format('d M, Y') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        {{-- recent news end --}}


                        <div class="widget">
                            @if (isset($ads7))
                                <div class="widget-ads"><a href="{{ $ads7->link }}" target="blank"><img class="w-100"
                                            src="{{ asset('uploads/ads') }}/{{ $ads7->ads }}" alt="Ads"></a></div>
                            @endif
                        </div>

                        {{-- popular tags start --}}
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">
                                @if (session()->get('lang') == 'english')
                                    Popular Tags
                                @else
                                    জনপ্রিয় ট্যাগ
                                @endif
                            </h3>
                            <div class="tagcloud">
                                @foreach ($populartags as $tag)
                                    <a
                                        href=" @if (session()->get('lang') == 'english') {{ route('post.tagAll', ['slug' => $tag->tags_en]) }}
                                       @else
                                       {{ route('post.tagAll', ['slug' => $tag->tags_bn]) }} @endif">
                                        @if (session()->get('lang') == 'english')
                                            {{ $tag->tags_en }}
                                        @else
                                            {{ $tag->tags_bn }}
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        {{-- popular tags end --}}

                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
