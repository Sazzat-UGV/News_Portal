@extends('frontend.layouts.master')
@section('title')
    All News
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
                @if (isset($postcategory->category) || isset($subcategory) == !null)
                    @if (isset($postcategory->category) == !null)
                        <li><a
                                href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $postcategory->category->category_name_slug_en]) }}
                    @else
                    {{ route('post.categoryAll', ['slug' => $postcategory->category->category_name_slug_bn]) }} @endif">
                                @if (session()->get('lang') == 'english')
                                    {{ $postcategory->category->category_name_en }}
                                @else
                                    {{ $postcategory->category->category_name_bn }}
                                @endif
                            </a></li>
                    @endif
                    @if (isset($subcategory) == !null)
                        <li>
                            @if (session()->get('lang') == 'english')
                                {{ $subcategory->subcategory_name_en }}
                            @else
                                {{ $subcategory->subcategory_name_bn }}
                            @endif
                        </li>
                    @endif
                @else
                    @if (session()->get('lang') == 'english')
                        Country
                    @else
                        সারাদেশ
                    @endif
                @endif


            </ul>
        </div>
    </div>
    {{-- page breadcumb end --}}

    {{-- all post start --}}
    <section class="space">
        <div class="container">

            <div class="row gy-30">
                @foreach ($posts as $post)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="blog-style1">
                            <div class="blog-img"><img src="{{ asset('uploads/thumbnail') }}/{{ $post->thumbnail }}"
                                    alt="news image"> <a data-theme-color="{{ $category_colors[$post->category->id] }}"
                                    href="@if (session()->get('lang') == 'english') {{ route('post.categoryAll', ['slug' => $post->category->category_name_slug_en]) }}
                                    @else
                                    {{ route('post.categoryAll', ['slug' => $post->category->category_name_slug_bn]) }} @endif"
                                    class="category">
                                    @if (session()->get('lang') == 'english')
                                        {{ $post->category->category_name_en }}
                                    @else
                                        {{ $post->category->category_name_bn }}
                                    @endif
                                </a></div>
                            <h3 class="box-title-20"><a class="hover-line"
                                    href="@if (session()->get('lang') == 'english') {{ route('post.detail', ['slug' => $post->title_slug_en]) }}
                                    @else
                                    {{ route('post.detail', ['slug' => $post->title_slug_bn]) }} @endif">
                                    @if (session()->get('lang') == 'english')
                                        {{ Str::limit($post->title_en, 100, '') }}
                                    @else
                                        {{ Str::limit($post->title_bn, 100, '') }}
                                    @endif
                                </a></h3>
                            <div class="blog-meta"><a href="#"><i class="far fa-user"></i>By -
                                    {{ $post->user->name }}</a> <a href="#"><i
                                        class="fal fa-calendar-days"></i>{{ $post->created_at->format('d M, Y') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="th-pagination mt-40 mb-0 d-flex justify-content-center">
                {{ $posts->links('vendor.pagination.custom') }}
            </div>

        </div>
    </section>
    {{-- all post end --}}
@endsection
@push('script')
@endpush
