@extends('backend.layouts.master')
@section('title')
    Change Password
@endsection
@push('admin_style')
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Change Password',
        'sub_page' => '',
    ])
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('admin.changePassword') }}" method="POST">
                        @csrf
                        <div class="col-12 mb-2">
                            <label for="old_password" class="form-label">Old Password<span
                                    class="text-danger">*</span></label>
                            <input type="password" name="old_password"
                                class="form-control @error('old_password')
                            is-invalid
                        @enderror"
                                id="old_password" placeholder="Enter old password">
                            @error('old_password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label for="new_password" class="form-label">New Password<span
                                    class="text-danger">*</span></label>
                            <input type="password" name="new_password"
                                class="form-control @error('new_password')
                            is-invalid
                        @enderror"
                                id="new_password" placeholder="Enter new password">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label for="retype_password" class="form-label">Retype Password<span
                                    class="text-danger">*</span></label>
                            <input type="password" name="retype_password"
                                class="form-control @error('retype_password')
                            is-invalid
                        @enderror"
                                id="retype_password" placeholder="Retype password">
                            @error('retype_password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Update</button>
                                <button type="reset" class="btn btn-outline-secondary px-4">Reset</button>
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
