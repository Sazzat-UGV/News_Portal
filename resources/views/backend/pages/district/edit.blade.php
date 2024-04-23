@extends('backend.layouts.master')
@section('title')
    Edit District
@endsection
@push('admin_style')
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Districts',
        'sub_page' => 'Edit District',
    ])


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('district.update', ['district' => $district->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-12 mb-2">
                            <label for="division_name" class="form-label">Select Division<span
                                    class="text-danger">*</span></label>
                            <select class="form-control @error('division_name') is-invalid @enderror"
                                aria-label="division_name" name="division_name">
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}"
                                        @if ($district->division_id == $division->id) selected
                                        @elseif (old('division_name') == $division->id)
                                        selected @endif>
                                        {{ $division->division_name_en }} | {{ $division->division_name_bn }}
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
                            <label for="district_name_english" class="form-label">District Name English<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="district_name_english"
                                class="form-control @error('district_name_english')
                                is-invalid
                            @enderror"
                                id="district_name_english" placeholder="Enter district name english"
                                value="{{ old('district_name_english', $district->district_name_en) }}">
                            @error('district_name_english')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="district_name_bangla" class="form-label">District Name Bangla<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="district_name_bangla"
                                class="form-control @error('district_name_bangla')
                            is-invalid
                        @enderror"
                                id="district_name_bangla" placeholder="Enter district name bangla"
                                value="{{ old('district_name_bangla', $district->district_name_bn) }}">
                            @error('district_name_bangla')
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
