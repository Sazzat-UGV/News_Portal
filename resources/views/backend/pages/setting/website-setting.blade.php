@extends('backend.layouts.master')
@section('title')
    Website Setting
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.dropify-message p {
    font-size: 26px;
}
</style>
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Settings',
        'sub_page' => ' Website Setting',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('website.settingUpdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12 mb-2">
                            <label for="short_description_english" class="form-label">Short Description English<span
                                class="text-danger">*</span></label>
                            <input type="text" name="short_description_english"
                                class="form-control @error('short_description_english')
                                 is-invalid
                                @enderror"
                                id="short_description_english" placeholder="Enter short description english"
                                value="{{ old('short_description_english', $setting->short_description_en) }}">
                            @error('short_description_english')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="short_description_bangla" class="form-label">Short Description Bangla<span
                                class="text-danger">*</span></label>
                            <input type="text" name="short_description_bangla"
                                class="form-control @error('short_description_bangla')
                                 is-invalid
                                @enderror"
                                id="short_description_bangla" placeholder="Enter short description bangla"
                                value="{{ old('short_description_bangla', $setting->short_description_bn) }}">
                            @error('short_description_bangla')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="logo" class="form-label">Website Logo (SVG)<span class="text-danger">*</span></label>
                            <input type="file" name="logo"
                                data-default-file="{{ asset('uploads/setting') }}/{{ $setting->logo }}"
                                class="form-control dropify @error('logo')
                                   is-invalid
                                  @enderror">
                            @error('logo')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="favicon" class="form-label">Favicon (192*192)<span class="text-danger">*</span></label>
                            <input type="file" name="favicon"
                                data-default-file="{{ asset('uploads/setting') }}/{{ $setting->favicon }}"
                                class="form-control dropify @error('favicon')
                                   is-invalid
                                  @enderror">
                            @error('favicon')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function() {
    $('.dropify').dropify();
});
</script>
@endpush
