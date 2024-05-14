@extends('frontend.layouts.master')
@section('title')
    Details
@endsection
@push('style')
    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=66439debbe17b9001974c692&product=sticky-share-buttons&source=platform"
        async="async"></script>
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

    {{-- page breadcumb start --}}
    <div class="breadcumb-wrapper">
        <div class="container">
            <ul class="breadcumb-menu">

                <li><a
                        href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $postdetails->category->category_name_slug_en]) }}
                @else
                {{ route('post.categoryAll', ['slug' => $postdetails->category->category_name_slug_bn]) }} @endif">
                        @if (session()->get('lang') == 'english')
                            {{ $postdetails->category->category_name_en }}
                        @else
                            {{ $postdetails->category->category_name_bn }}
                        @endif
                    </a></li>

                @if (isset($postdetails->subcategory) == !null)
                    <li>
                        @if (session()->get('lang') == 'english')
                            {{ $postdetails->subcategory->subcategory_name_en }}
                        @else
                            {{ $postdetails->subcategory->subcategory_name_bn }}
                        @endif
                    </li>
                @endif

            </ul>
        </div>
    </div>
    {{-- page breadcumb end --}}

    <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row">

                {{-- post details start --}}
                <div class="col-xxl-9 col-lg-8">
                    <div class="th-blog blog-single"><a data-theme-color="{{ $category_colors[$postdetails->category->id] }}"
                            href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $postdetails->category->category_name_slug_en]) }}
                        @else
                        {{ route('post.categoryAll', ['slug' => $postdetails->category->category_name_slug_bn]) }} @endif"
                            class="category">
                            @if (session()->get('lang') == 'english')
                                {{ $postdetails->category->category_name_en }}
                            @else
                                {{ $postdetails->category->category_name_bn }}
                            @endif
                        </a>
                        <h2 class="blog-title">
                            @if (session()->get('lang') == 'english')
                                {{ $postdetails->title_en }}
                            @else
                                {{ $postdetails->title_bn }}
                            @endif
                        </h2>
                        <div class="blog-meta"><a class="author" href="#"><i class="far fa-user"></i>By -
                                {{ $postdetails->user->name }}</a> <a href="#"><i
                                    class="fal fa-calendar-days"></i>{{ $postdetails->created_at->format('d M, Y') }}</a>
                        </div>

                        <div class="blog-img"><img src="{{ asset('uploads/thumbnail') }}/{{ $postdetails->thumbnail }}"
                                alt="News Image">
                        </div>

                        <div class="blog-content-wrap">
                            <div class="blog-content">

                                <div class="blog-info-wrap">
                                    <a
                                        href=" @if (session()->get('lang') == 'english') {{ route('post.tagAll', ['slug' => $postdetails->tags_en]) }}
                                        @else
                                        {{ route('post.tagAll', ['slug' => $postdetails->tags_bn]) }} @endif">
                                        <button class="blog-info ms-sm-auto">
                                            @if (session()->get('lang') == 'english')
                                                {{ $postdetails->tags_en }}
                                            @else
                                                {{ $postdetails->tags_bn }}
                                            @endif
                                            <i class="fas fa-tags"></i>
                                        </button>
                                    </a>
                                </div>

                                <div class="content">
                                    @if (session()->get('lang') == 'english')
                                        {!! $postdetails->details_en !!}
                                    @else
                                        {!! $postdetails->details_bn !!}
                                    @endif
                                </div>

                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-sticky-share-buttons"></div>
                                <!-- ShareThis END -->

                                {{-- related tag  start --}}
                                <div class="blog-tag">
                                    <h6 class="title">
                                        @if (session()->get('lang') == 'english')
                                            Related Tag :
                                        @else
                                            সম্পর্কিত ট্যাগ :
                                        @endif
                                    </h6>
                                    <div class="tagcloud">
                                        @foreach ($releted_tags as $rtag)
                                            <a
                                                href=" @if (session()->get('lang') == 'english') {{ route('post.tagAll', ['slug' => $rtag->tags_en]) }}
                                                @else
                                                {{ route('post.tagAll', ['slug' => $rtag->tags_bn]) }} @endif">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $rtag->tags_en }}
                                                @else
                                                    {{ $rtag->tags_bn }}
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- related tag  end --}}

                                <div class="my-4 py-lg-2">

                                    @if (isset($ads5))
                                        <a href="{{ $ads5->link }}" target="blank"><img class="light-img w-100"
                                                src="{{ asset('uploads/ads') }}/{{ $ads5->ads }}" alt="Ads">
                                            <img class="dark-img w-100"
                                                src="{{ asset('uploads/ads') }}/{{ $ads5->ads }}" alt="Ads"></a>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>

                    {{--  related post start --}}
                    <div class="related-post-wrapper pt-30 mb-30">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="sec-title has-line">
                                    @if (session()->get('lang') == 'english')
                                        Related Post
                                    @else
                                        সম্পর্কিত পোস্ট
                                    @endif
                                </h2>
                            </div>
                            <div class="col-auto">
                                <div class="sec-btn">
                                    <div class="icon-box"><button data-slick-prev="#related-post-slide"
                                            class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
                                        <button data-slick-next="#related-post-slide" class="slick-arrow default"><i
                                                class="far fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row slider-shadow th-carousel" id="related-post-slide" data-slide-show="3"
                            data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="2">

                            @foreach ($releted_post as $rpost)
                                <div class="col-sm-6 col-xl-4">
                                    <div class="blog-style1">
                                        <div class="blog-img"><img
                                                src="{{ asset('uploads/thumbnail') }}/{{ $rpost->thumbnail }}"
                                                alt="news image"> <a
                                                data-theme-color="{{ $category_colors[$rpost->category->id] }}"
                                                href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $rpost->category->category_name_slug_en]) }}
                                            @else
                                            {{ route('post.categoryAll', ['slug' => $rpost->category->category_name_slug_bn]) }} @endif"
                                                class="category">
                                                @if (session()->get('lang') == 'english')
                                                    {{ $rpost->category->category_name_en }}
                                                @else
                                                    {{ $rpost->category->category_name_bn }}
                                                @endif
                                            </a>
                                        </div>
                                        <h3 class="box-title-22"><a class="hover-line"
                                                href="@if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $rpost->title_slug_en]) }}
                                        @else
                                        {{ route('post.detail', ['slug' => $rpost->title_slug_bn]) }} @endif">
                                                @if (session()->get('lang') == 'english')
                                                    {{ Str::limit($rpost->title_en, 100, '') }}
                                                @else
                                                    {{ Str::limit($rpost->title_bn, 100, '') }}
                                                @endif
                                            </a></h3>
                                        <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                                {{ $rpost->user->name }}</a> <a href="#"><i
                                                    class="fal fa-calendar-days"></i>{{ $rpost->created_at->format('d M, Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    {{--  related post end --}}

                </div>
                {{-- post details end --}}

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
                            @if (isset($ads6))
                                <div class="widget-ads"><a href="{{ $ads6->link }}" target="blank"><img class="w-100"
                                            src="{{ asset('uploads/ads') }}/{{ $ads6->ads }}" alt="Ads"></a>
                                </div>
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
