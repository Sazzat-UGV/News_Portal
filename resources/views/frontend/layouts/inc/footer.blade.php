<footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('assets/frontend') }}/img/bg/footer_bg_1.png">
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo"><a href="home-newspaper.html"><img
                                        src="{{ asset('assets/frontend') }}/img/logo-footer.svg" alt="Tnews"></a>
                            </div>
                            <p class="about-text">Magazines cover a wide subjects, including not limited to
                                fashion, lifestyle, health, politics, business, Entertainment, sports, science,</p>
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
                        <h3 class="widget_title">Categories</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="blog.html">Political</a></li>
                                <li><a href="blog.html">Business</a></li>
                                <li><a href="blog.html">Health</a></li>
                                <li><a href="blog.html">Technology</a></li>
                                <li><a href="blog.html">Sports</a></li>
                                <li><a href="blog.html">Entertainment</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="recent-post-wrap">
                            <div class="recent-post">
                                <div class="media-img"><a href="blog-details.html"><img
                                            src="{{ asset('assets/frontend') }}/img/blog/recent-post-2-1.jpg"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="hover-line" href="blog-details.html">Equality and
                                            justice for Every citizen</a>
                                    </h4>
                                    <div class="recent-post-meta"><a href="blog.html"><i
                                                class="fal fa-calendar-days"></i>21 June, 2023</a></div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="media-img"><a href="blog-details.html"><img
                                            src="{{ asset('assets/frontend') }}/img/blog/recent-post-2-2.jpg"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="hover-line" href="blog-details.html">Key
                                            eyes on the latest update of technology</a></h4>
                                    <div class="recent-post-meta"><a href="blog.html"><i
                                                class="fal fa-calendar-days"></i>22 June, 2023</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="widget widget_tag_cloud footer-widget">
                        <h3 class="widget_title">Popular Tags</h3>
                        <div class="tagcloud"><a href="blog.html">Sports</a> <a href="blog.html">Politics</a>
                            <a href="blog.html">Business</a> <a href="blog.html">Music</a> <a href="blog.html">Food</a>
                            <a href="blog.html">Technology</a> <a href="blog.html">Travels</a> <a
                                href="blog.html">Health</a> <a href="blog.html">Fashions</a> <a
                                href="blog.html">Animal</a> <a href="blog.html">Weather</a> <a
                                href="blog.html">Movies</a>
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
                    <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2023 <a
                            href="home-newspaper.html">Tnews</a>. All Rights Reserved.</p>
                </div>
                <div class="col-lg-auto ms-auto d-none d-lg-block">
                    <div class="footer-links">
                        <ul>
                            <li><a href="home-newspaper.html">Home</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="about.html">Faq</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
