<footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('assets/frontend') }}/img/bg/footer_bg_1.png">
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            @php
                                $website_setting = App\Models\Setting::first();
                            @endphp
                            <div class="about-logo"><a href="{{ route('homepage') }}"><img
                                        src="{{ asset('uploads/setting') }}/{{ $website_setting->logo }}"
                                        alt="Tnews"></a>
                            </div>
                            <p class="about-text">
                                @if (session()->get('lang') == 'english')
                                    {{ $website_setting->short_description_en }}
                                @else
                                    {{ $website_setting->short_description_bn }}
                                @endif
                            </p>
                            @php
                                $social = App\Models\Social::first();
                            @endphp
                            <div class="th-social style-black">
                                <a href="{{ $social->facebook }}" target="blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $social->twitter }}" target="blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $social->instagram }}" target="blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $social->linkedin }}" target="blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="{{ $social->youtube }}" target="blank"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        @php
                            $importantWebsits = App\Models\Importentwebsite::where('status', 1)
                                ->latest('id')
                                ->limit(6)
                                ->get();
                        @endphp
                        @if (session()->get('lang') == 'english')
                            <h3 class="widget_title">Important Website</h3>
                        @else
                            <h4 class="widget_title">গুরুত্বপূর্ণ ওয়েবসাইট</h4>
                        @endif

                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach ($importantWebsits as $website)
                                    @if (session()->get('lang') == 'english')
                                        <li><a href="{{ $website->website_link }}"
                                                target="blank">{{ $website->website_name_en }}</a>
                                        </li>
                                    @else
                                        <li><a href="{{ $website->website_link }}"
                                                target="blank">{{ $website->website_name_bn }}</a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                @php
                    $recentfooternews = App\Models\Post::where('status', 1)
                        ->latest('id')
                        ->select(
                            'id',
                            'title_en',
                            'title_bn',
                            'thumbnail',
                            'created_at',
                            'title_slug_en',
                            'title_slug_bn',
                        )
                        ->limit(2)
                        ->get();
                @endphp
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">
                            @if (session()->get('lang') == 'english')
                                Recent
                            @else
                                সাম্প্রতিক
                            @endif
                        </h3>
                        <div class="recent-post-wrap">
                            @foreach ($recentfooternews as $footer_news)
                                <div class="recent-post">
                                    <div class="media-img"><a href="#"><img
                                                src="{{ asset('uploads/thumbnail') }}/{{ $footer_news->thumbnail }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="hover-line"
                                                href="

                                            @if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $footer_news->title_slug_en]) }}
                                            @else
                                            {{ route('post.detail', ['slug' => $footer_news->title_slug_bn]) }} @endif">
                                                @if (session()->get('lang') == 'english')
                                                    {{ Str::limit($footer_news->title_en, 60, '') }}
                                                @else
                                                    {{ Str::limit($footer_news->title_bn, 60, '') }}
                                                @endif
                                            </a>
                                        </h4>
                                        <div class="recent-post-meta"><a href="#"><i
                                                    class="fal fa-calendar-days"></i>
                                                {{ $footer_news->created_at->format('d M, Y') }}

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">
                            @if (session()->get('lang') == 'english')
                                Photo Gallery
                            @else
                                ফটো গ্যালারি
                            @endif
                        </h3>
                        <div class="sidebar-gallery">
                            @php
                                $photos = App\Models\Photo::where('status', 1)
                                    ->select('id', 'photo')
                                    ->latest('id')
                                    ->limit(9)
                                    ->get();
                            @endphp
                            @foreach ($photos as $photo)
                                <div class="gallery-thumb"><img
                                        src="{{ asset('uploads/photo-gallery') }}/{{ $photo->photo }}"
                                        alt="Gallery Image"> <a
                                        href="{{ asset('uploads/photo-gallery') }}/{{ $photo->photo }}"
                                        class="gallery-btn popup-image"><i class="fab fa-instagram"></i></a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row jusity-content-between align-items-center">
                <div class="col-lg-5">
                    <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> {{ date('Y') }} <a
                            href="{{ route('homepage') }}">Tnews</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
