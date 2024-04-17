@extends('backend.layouts.master')
@section('title')
    Edit Subcategory
@endsection
@push('admin_style')
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Subcategories',
        'sub_page' => 'Edit Subcategory',
    ])


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('subcategory.update', ['subcategory' => $subcategory->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-12 mb-2">
                            <label for="category_name" class="form-label">Select Category<span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('category_name') is-invalid @enderror"
                                aria-label="category_name" class="js-example-basic-single" name="category_name">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($subcategory->category_id == $category->id) selected
                                        @elseif (old('category_name') == $category->id)
                                        selected @endif>
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
                                value="{{ old('subcategory_name_english', $subcategory->subcategory_name_en) }}">
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
                                value="{{ old('subcategory_name_bangla', $subcategory->subcategory_name_bn) }}">
                            @error('subcategory_name_bangla')
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
