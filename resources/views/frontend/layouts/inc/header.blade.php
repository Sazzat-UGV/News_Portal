@php
    $categories = App\Models\Category::where('status', 1)->select('id', 'category_name_bn', 'category_name_en')->get();
@endphp
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo"><a href="{{ route('homepage') }}"><img src="{{ asset('assets/frontend') }}/img/logo.svg"
                    alt="Tnews"></a></div>
        <div class="th-mobile-menu">
            <ul>

                @foreach ($categories as $category)
                    <li class="menu-item-has-children"><a href="#">
                        @if (session()->get('lang')=='english')
                        {{ $category->category_name_en }}
                        @else
                        {{ $category->category_name_bn }}
                        @endif
                        </a>
                        <ul class="sub-menu">
                            @php
                                $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                    ->where('status', 1)
                                    ->select('id', 'subcategory_name_bn', 'subcategory_name_en')
                                    ->get();
                            @endphp
                            @foreach ($subcategories as $subcategory)
                                <li><a href="#">  @if (session()->get('lang')=='english')
                                    {{ $subcategory->subcategory_name_en }}
                                    @else
                                    {{ $subcategory->subcategory_name_bn }}
                                    @endif
                                   </a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>



<header class="th-header header-layout2">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-md-between align-items-center gy-2">

                <div class="col-auto d-none d-lg-inline-block">
                    <div class="header-logo"><a href="{{ route('homepage') }}"><img
                                src="{{ asset('assets/frontend') }}/img/logo.svg" alt="Tnews"></a></div>
                </div>
                <div class="col-auto text-center text-md-end">
                    <div class="header-icon">
                        <div class="theme-switcher"><button><span class="dark"><i class="fas fa-moon"></i></span>
                                <span class="light"><i class="fas fa-sun-bright"></i></span></button></div>
                    </div>
                    <div class="header-links">
                        <ul>
                            <li><i class="fal fa-calendar-days"></i><a href="#">{{ date('l') }}
                                {{ date('d M, Y') }}</a>
                        </li>
                        @if (session()->get('lang')=='english')
                        <li><a href="{{ route('lang.bangla') }}">বাংলা</a></li>
                        @else
                        <li><a href="{{ route('lang.english') }}">English</a></li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto d-lg-none d-block">
                        <div class="header-logo"><a href="{{ route('homepage') }}"><img
                                    src="{{ asset('assets/frontend') }}/img/logo-white.svg" alt="Tnews"></a></div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>

                                @foreach ($categories as $category)
                                    <li class="menu-item-has-children"><a href="#">
                                        @if (session()->get('lang')=='english')
                                        {{ $category->category_name_en }}
                                        @else
                                        {{ $category->category_name_bn }}
                                        @endif
                                        </a>
                                        <ul class="sub-menu">
                                            @php
                                                $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                                    ->where('status', 1)
                                                    ->select('id', 'subcategory_name_bn', 'subcategory_name_en')
                                                    ->get();
                                            @endphp
                                            @foreach ($subcategories as $subcategory)
                                                <li><a href="#">  @if (session()->get('lang')=='english')
                                                    {{ $subcategory->subcategory_name_en }}
                                                    @else
                                                    {{ $subcategory->subcategory_name_bn }}
                                                    @endif
                                                   </a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="th-menu-toggle d-block d-lg-none"><i
                                class="far fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
