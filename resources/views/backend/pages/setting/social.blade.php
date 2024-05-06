@extends('backend.layouts.master')
@section('title')
    Social Setting
@endsection
@push('admin_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Settings',
        'sub_page' => ' Social Setting',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('social.settingUpdate') }}" method="POST">
                        @csrf

                        <div class="col-6 mb-2">
                            <label for="facebook" class="form-label">Facebook (<i
                                    class="fa-brands fa-facebook"></i>)</label>
                            <input type="text" name="facebook"
                                class="form-control @error('facebook')
                                 is-invalid
                                @enderror"
                                id="facebook" placeholder="Enter facebook link"
                                value="{{ old('facebook', $social->facebook) }}">
                            @error('facebook')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="twitter" class="form-label">Twitter (<i class="fa-brands fa-twitter"></i>)</label>
                            <input type="text" name="twitter"
                                class="form-control @error('twitter')
                                 is-invalid
                                @enderror"
                                id="twitter" placeholder="Enter twitter link"
                                value="{{ old('twitter', $social->twitter) }}">
                            @error('twitter')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="youtube" class="form-label">Youtube (<i class="fa-brands fa-youtube"></i>)</label>
                            <input type="text" name="youtube"
                                class="form-control @error('youtube')
                                 is-invalid
                                @enderror"
                                id="youtube" placeholder="Enter youtube link"
                                value="{{ old('youtube', $social->youtube) }}">
                            @error('youtube')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="instagram" class="form-label">Instagram (<i
                                    class="fa-brands fa-instagram"></i>)</label>
                            <input type="text" name="instagram"
                                class="form-control @error('instagram')
                                 is-invalid
                                @enderror"
                                id="instagram" placeholder="Enter instagram link"
                                value="{{ old('instagram', $social->instagram) }}">
                            @error('instagram')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="linkedin" class="form-label">Linkedin (<i
                                    class="fa-brands fa-linkedin"></i>)</label>
                            <input type="text" name="linkedin"
                                class="form-control @error('linkedin')
                                 is-invalid
                                @enderror"
                                id="linkedin" placeholder="Enter linkedin link"
                                value="{{ old('linkedin', $social->linkedin) }}">
                            @error('linkedin')
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
