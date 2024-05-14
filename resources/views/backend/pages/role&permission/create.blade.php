@extends('backend.layouts.master')
@section('title')
    Add Permission
@endsection
@push('admin_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Role & Permission',
        'sub_page' => 'Add Permission',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="col-12 mb-2">
                            <label for="admin_name" class="form-label">Admin Name<span class="text-danger">*</span></label>
                            <input type="text" name="admin_name"
                                class="form-control @error('admin_name')
                        is-invalid
                    @enderror"
                                id="admin_name" placeholder="Enter admin name" value="{{ old('admin_name') }}">
                            @error('admin_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="admin_email" class="form-label">Admin Email<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="admin_email"
                                class="form-control @error('admin_email')
                        is-invalid
                    @enderror"
                                id="admin_email" placeholder="Enter admin email" value="{{ old('admin_email') }}">
                            @error('admin_email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password"
                                class="form-control @error('password')
                        is-invalid
                    @enderror"
                                id="password" placeholder="Enter password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="retype_password" class="form-label">Retype Password<span
                                    class="text-danger">*</span></label>
                            <input type="password" name="retype password"
                                class="form-control @error('retype_password')
                        is-invalid
                    @enderror"
                                id="retype_password" placeholder="Enter retype_password"
                                value="{{ old('retype_password') }}">
                            @error('retype_password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <h5 class="text-center border-bottom">Permission</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="form-check mb-2 mt-2">
                                <input class="form-check-input" name="category" type="checkbox" value="1"
                                    @if (old('category')) checked @endif id="category">
                                <label class="form-check-label" for="category">
                                    Category
                                </label>
                            </div>
                            <div class="form-check mb-2 mt-2">
                                <input class="form-check-input" name="subcategory" type="checkbox" value="1"
                                    @if (old('subcategory')) checked @endif id="subcategory">
                                <label class="form-check-label" for="subcategory">
                                    Subcategory
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="1" name="division"
                                    @if (old('division')) checked @endif id="division">
                                <label class="form-check-label" for="division">
                                    Division
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="1" name="district"
                                    @if (old('district')) checked @endif id="district">
                                <label class="form-check-label" for="district">
                                    District
                                </label>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="form-check mb-2 mt-2">
                                <input class="form-check-input" name="post" type="checkbox" value="1"
                                    @if (old('post')) checked @endif id="post">
                                <label class="form-check-label" for="post">
                                    Post
                                </label>
                            </div>
                            <div class="form-check mb-2 mt-2">
                                <input class="form-check-input" name="widget" type="checkbox" value="1"
                                    @if (old('widget')) checked @endif id="widget">
                                <label class="form-check-label" for="widget">
                                    Widget
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="1" name="ads"
                                    @if (old('ads')) checked @endif id="ads">
                                <label class="form-check-label" for="ads">
                                    Ads
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="1" name="permission"
                                    @if (old('permission')) checked @endif id="permission">
                                <label class="form-check-label" for="permission">
                                    Permission
                                </label>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <div class="form-check mb-2 mt-2">
                                <input class="form-check-input" name="gallery" type="checkbox" value="1"
                                    @if (old('gallery')) checked @endif id="gallery">
                                <label class="form-check-label" for="gallery">
                                    Gallery
                                </label>
                            </div>
                            <div class="form-check mb-2 mt-2">
                                <input class="form-check-input" name="setting" type="checkbox" value="1"
                                    @if (old('setting')) checked @endif id="setting">
                                <label class="form-check-label" for="setting">
                                    Setting
                                </label>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Add</button>
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
