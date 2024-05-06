@extends('backend.layouts.master')
@section('title')
    SEO Setting
@endsection
@push('admin_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Settings',
        'sub_page' => ' SEO Setting',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('seo.settingUpdate') }}" method="POST">
                        @csrf

                        <div class="col-4 mb-2">
                            <label for="meta_author" class="form-label">Meta Author </label>
                            <input type="text" name="meta_author"
                                class="form-control @error('meta_author')
                                 is-invalid
                                @enderror"
                                id="meta_author" placeholder="Enter meta author"
                                value="{{ old('meta_author', $seo->meta_author) }}">
                            @error('meta_author')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-4 mb-2">
                            <label for="meta_title" class="form-label">Meta Title </label>
                            <input type="text" name="meta_title"
                                class="form-control @error('meta_title')
                                 is-invalid
                                @enderror"
                                id="meta_title" placeholder="Enter meta title"
                                value="{{ old('meta_title', $seo->meta_title) }}">
                            @error('meta_title')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-4 mb-2">
                            <label for="meta_keyword" class="form-label">Meta Keyword </label>
                            <input type="text" name="meta_keyword"
                                class="form-control @error('meta_keyword')
                                 is-invalid
                                @enderror"
                                id="meta_keyword" placeholder="Enter meta keyword"
                                value="{{ old('meta_keyword', $seo->meta_keyword) }}">
                            @error('meta_keyword')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="google_verification" class="form-label">Google Verification</label>
                            <input type="text" name="google_verification"
                                class="form-control @error('google_verification')
                                 is-invalid
                                @enderror"
                                id="google_verification" placeholder="Enter google verification"
                                value="{{ old('google_verification', $seo->google_verification) }}">
                            @error('google_verification')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="meta_description" class="form-label">Meta Description </label>
                            <textarea rows="5" cols="30"
                                class="form-control @error('meta_description')
                            is-invalid
                           @enderror"
                                id="editor2" placeholder="Enter meta description" name="meta_description">{{ old('meta_description', $seo->meta_description) }}</textarea>
                            @error('meta_description')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="google_analytics" class="form-label">Google Analytics </label>
                            <textarea rows="5" cols="30"
                                class="form-control @error('google_analytics')
                            is-invalid
                           @enderror"
                                id="editor2" placeholder="Enter google analytics" name="google_analytics">{{ old('google_analytics', $seo->google_analytics) }}</textarea>
                            @error('google_analytics')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="alexa_analytics" class="form-label">Alexa Analytics</label>
                            <textarea rows="5" cols="30"
                                class="form-control @error('alexa_analytics')
                            is-invalid
                           @enderror"
                                id="editor2" placeholder="Enter alexa analytics" name="alexa_analytics">{{ old('alexa_analytics', $seo->alexa_analytics) }}</textarea>
                            @error('alexa_analytics')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
