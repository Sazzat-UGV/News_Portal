@extends('backend.layouts.master')
@section('title')
    Edit Division
@endsection
@push('admin_style')
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Divisions',
        'sub_page' => 'Edit Division',
    ])


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('division.update', ['division' => $division->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-12 mb-2">
                            <label for="division_name_english" class="form-label">Division Name English<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="division_name_english"
                                class="form-control @error('division_name_english')
                    is-invalid
                @enderror"
                                id="division_name_english" placeholder="Enter division name english"
                                value="{{ old('division_name_english', $division->division_name_en) }}">
                            @error('division_name_english')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="division_name_bangla" class="form-label">Division Name Bangla<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="division_name_bangla"
                                class="form-control @error('division_name_bangla')
                            is-invalid
                        @enderror"
                                id="division_name_bangla" placeholder="Enter division name bangla"
                                value="{{ old('division_name_bangla', $division->division_name_bn) }}">
                            @error('division_name_bangla')
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
