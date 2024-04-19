@extends('backend.layouts.master')
@section('title')
    Add Subcategory
@endsection
@push('admin_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Subcategories',
        'sub_page' => 'Add Subcategory',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('subcategory.store') }}" method="POST">
                        @csrf
                        <div class="col-12 mb-2">
                            <label for="category_name" class="form-label">Select Category<span
                                    class="text-danger">*</span></label>
                            <select class=form-control @error('category_name') is-invalid @enderror"
                                aria-label="category_name" class="js-example-basic-single" name="category_name">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_name') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name_en }} | {{ $category->category_name_bn }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="subcategory_name_english" class="form-label">Subcategory Name English<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="subcategory_name_english"
                                class="form-control @error('subcategory_name_english')
                        is-invalid
                    @enderror"
                                id="subcategory_name_english" placeholder="Enter subcategory name english"
                                value="{{ old('subcategory_name_english') }}">
                            @error('subcategory_name_english')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="subcategory_name_bangla" class="form-label">Subcategory Name Bangla<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="subcategory_name_bangla"
                                class="form-control @error('subcategory_name_bangla')
                                is-invalid
                            @enderror"
                                id="subcategory_name_bangla" placeholder="Enter subcategory name bangla"
                                value="{{ old('subcategory_name_bangla') }}">
                            @error('subcategory_name_bangla')
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
