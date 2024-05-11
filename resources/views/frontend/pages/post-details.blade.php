@extends('frontend.layouts.master')
@section('title')
    Details
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

    {{-- page breadcumb start --}}
    <div class="breadcumb-wrapper">
        <div class="container">
            <ul class="breadcumb-menu">

                <li><a href="#">
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
                            href="#" class="category">
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
                                    <button class="blog-info print_btn">Print : <i class="fas fa-print"></i></button>
                                    <a class="blog-info" href="mailto:">Email : <i class="fas fa-envelope"></i> </a>
                                    <button class="blog-info ms-sm-auto">15k <i class="fas fa-thumbs-up"></i></button> <span
                                        class="blog-info">126k <i class="fas fa-eye"></i></span>
                                    <span class="blog-info">12k <i class="fas fa-share-nodes"></i></span>
                                </div>

                                <div class="content">
                                    @if (session()->get('lang') == 'english')
                                        {!! $postdetails->details_en !!}
                                    @else
                                        {!! $postdetails->details_bn !!}
                                    @endif

                                </div>

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
                                            <a href="#">
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
                                    <a href="https://themeforest.net/user/themeholy/portfolio"><img
                                            class="light-img w-100"
                                            src="{{ asset('assets/frontend') }}/img/ads/ads_blog_1.jpg" alt="Ads">
                                        <img class="dark-img w-100"
                                            src="{{ asset('assets/frontend') }}/img/ads/ads_blog_1_dark.jpg"
                                            alt="Ads"></a>
                                </div>

                            </div>
                        </div>
                    </div>













































                    <div class="blog-author">
                        <div class="auhtor-img"><img src="{{ asset('assets/frontend') }}/img/blog/blog-author.jpg"
                                alt="Blog Author Image">
                        </div>
                        <div class="media-body">
                            <div class="author-top">
                                <div>
                                    <h3 class="author-name"><a class="text-inherit" href="team-details.html">Ronald
                                            Richards</a></h3><span class="author-desig">Founder & CEO</span>
                                </div>
                                <div class="social-links"><a href="https://facebook.com/" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a> <a href="https://twitter.com/"
                                        target="_blank"><i class="fab fa-twitter"></i></a> <a href="https://linkedin.com/"
                                        target="_blank"><i class="fab fa-linkedin-in"></i></a> <a
                                        href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <p class="author-text">Adventurer and passionate travel blogger. With a backpack full of
                                stories and a camera in hand, she takes her readers on exhilarating journeys around the
                                world.</p>
                        </div>
                    </div>
                    <div class="th-comments-wrap">
                        <h2 class="blog-inner-title h3">Comments (03)</h2>
                        <ul class="comment-list">
                            <li class="th-comment-item">
                                <div class="th-post-comment">
                                    <div class="comment-avater"><img
                                            src="{{ asset('assets/frontend') }}/img/blog/comment-author-1.jpg"
                                            alt="Comment Author"></div>
                                    <div class="comment-content"><span class="commented-on"><i
                                                class="fas fa-calendar-alt"></i>14 March, 2023</span>
                                        <h3 class="name">Brooklyn Simmons</h3>
                                        <p class="text">Your sport blog is simply fantastic! The in-depth analysis,
                                            engaging writing style, and up-to-date coverage of various sports events
                                            make it a must-visit for any sports enthusiast.</p>
                                        <div class="reply_and_edit"><a href="blog-details.html" class="reply-btn"><i
                                                    class="fas fa-reply"></i>Reply</a></div>
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="th-comment-item">
                                        <div class="th-post-comment">
                                            <div class="comment-avater"><img
                                                    src="{{ asset('assets/frontend') }}/img/blog/comment-author-2.jpg"
                                                    alt="Comment Author"></div>
                                            <div class="comment-content"><span class="commented-on"><i
                                                        class="fas fa-calendar-alt"></i>15 March, 2023</span>
                                                <h3 class="name">Marvin McKinney</h3>
                                                <p class="text">Whether it's breaking news, expert opinions, or
                                                    inspiring athlete profiles, your blog delivers a winning combination
                                                    of excitement and information that keeps.</p>
                                                <div class="reply_and_edit"><a href="blog-details.html"
                                                        class="reply-btn"><i class="fas fa-reply"></i>Reply</a></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="th-comment-item">
                                <div class="th-post-comment">
                                    <div class="comment-avater"><img
                                            src="{{ asset('assets/frontend') }}/img/blog/comment-author-3.jpg"
                                            alt="Comment Author"></div>
                                    <div class="comment-content"><span class="commented-on"><i
                                                class="fas fa-calendar-alt"></i>16 March, 2023</span>
                                        <h3 class="name">Ronald Richards</h3>
                                        <p class="text">The way you seamlessly blend statistical insights with
                                            compelling storytelling creates an immersive and captivating reading
                                            experience. Whether it's the latest match updates, behind-the-scenes
                                            glimpses.</p>
                                        <div class="reply_and_edit"><a href="blog-details.html" class="reply-btn"><i
                                                    class="fas fa-reply"></i>Reply</a></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="th-comment-form">
                        <div class="form-title">
                            <h3 class="blog-inner-title mb-2">Leave a Comment</h3>
                            <p class="form-text">Your email address will not be published. Required fields are marked *
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group"><input type="text" placeholder="Your Name*"
                                    class="form-control"> <i class="far fa-user"></i></div>
                            <div class="col-md-6 form-group"><input type="text" placeholder="Your Email*"
                                    class="form-control"> <i class="far fa-envelope"></i></div>
                            <div class="col-12 form-group"><input type="text" placeholder="Website"
                                    class="form-control"> <i class="far fa-globe"></i></div>
                            <div class="col-12 form-group">
                                <textarea placeholder="Write a Comment*" class="form-control"></textarea> <i class="far fa-pencil"></i>
                            </div>
                            <div class="col-12 form-group mb-0"><button class="th-btn">Post Comment</button></div>
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
                                                href="#" class="category">
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
                            <div class="widget-ads"><a href="https://themeforest.net/user/themeholy/portfolio"><img
                                        class="w-100" src="{{ asset('assets/frontend') }}/img/ads/siderbar_ads_1.jpg"
                                        alt="ads"></a></div>
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
                                    <a href="#">
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
