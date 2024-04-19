@extends('backend.layouts.master')
@section('title')
    Add Division
@endsection
@push('admin_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Divisions',
        'sub_page' => 'Add Division',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('division.store') }}" method="POST">
                        @csrf
                        <div class="col-12 mb-2">
                            <label for="division_name_english" class="form-label">Division Name English<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="division_name_english"
                                class="form-control @error('division_name_english')
                        is-invalid
                    @enderror"
                                id="division_name_english" placeholder="Enter division name english"
                                value="{{ old('division_name_english') }}">
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
                                value="{{ old('division_name_bangla') }}">
                            @error('division_name_bangla')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
