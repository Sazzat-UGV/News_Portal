@extends('backend.layouts.master')
@section('title')
    Add Post
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
        'main_page' => 'Posts',
        'sub_page' => 'Add Post',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-6 mb-2">
                            <label for="title_bangla" class="form-label">Title Bangla<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="title_bangla"
                                class="form-control @error('title_bangla')
                                   is-invalid
                                  @enderror"
                                id="title_bangla" placeholder="Enter title bangla" value="{{ old('title_bangla') }}">
                            @error('title_bangla')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="title_english" class="form-label">Title English<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="title_english"
                                class="form-control @error('title_english')
                                   is-invalid
                                  @enderror"
                                id="title_english" placeholder="Enter title english" value="{{ old('title_english') }}">
                            @error('title_english')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="category_name" class="form-label">Select Category<span
                                    class="text-danger">*</span></label>
                            <select class="form-control @error('category_name') is-invalid @enderror"
                                aria-label="category_name" name="category_name" id="category_name">
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
                        <div class="col-6 mb-2">
                            <label for="subcategory_name" class="form-label">Select Subcategory</label>
                            <select class="form-control @error('subcategory_name') is-invalid @enderror"
                                aria-label="subcategory_name" name="subcategory_name" id="subcategory_name">
                                <option value="">Select Subcategory</option>
                            </select>
                            @error('subcategory_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="division_name" class="form-label">Select Division<span
                                    class="text-danger">*</span></label>
                            <select class="form-control @error('division_name') is-invalid @enderror"
                                aria-label="division_name" name="division_name" id="division_name">
                                <option value="">Select Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}"
                                        {{ old('division_name') == $division->id ? 'selected' : '' }}>
                                        {{ $division->division_name_en }} | {{ $division->division_name_bn }}
                                    </option>
                                @endforeach
                            </select>
                            @error('division_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="district_name" class="form-label">Select District</label>
                            <select class="form-control @error('district_name') is-invalid @enderror"
                                aria-label="district_name" name="district_name" id="district_name">
                                <option value="">Select District</option>
                            </select>
                            @error('district_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label for="thumbnail" class="form-label">Thumbnail<span class="text-danger">*</span></label>
                            <input type="file" name="thumbnail"
                                class="form-control dropify @error('thumbnail')
                                   is-invalid
                                  @enderror">
                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="tags_bangla" class="form-label">Tags Bangla<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="tags_bangla"
                                class="form-control @error('tags_bangla')
                                   is-invalid
                                  @enderror"
                                id="tags_bangla" placeholder="Enter tags bangla" value="{{ old('tags_bangla') }}">
                            @error('tags_bangla')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="tags_english" class="form-label">Tags English<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="tags_english"
                                class="form-control @error('tags_english')
                                   is-invalid
                                  @enderror"
                                id="tags_english" placeholder="Enter tags english" value="{{ old('tags_english') }}">
                            @error('tags_english')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label for="details_english" class="form-label">Details English<span
                                    class="text-danger">*</span></label>
                            <textarea rows="30" cols="30"
                                class="form-control @error('details_english')
                            is-invalid
                           @enderror"
                                id="editor" placeholder="Enter details english" name="details_english">{{ old('details_english') }}</textarea>
                            @error('details_english')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label for="details_bangla" class="form-label">Details Bangla<span
                                    class="text-danger">*</span></label>
                            <textarea rows="30" cols="30"
                                class="form-control @error('details_bangla')
                            is-invalid
                           @enderror"
                                id="editor2" placeholder="Enter details bangla" name="details_bangla">{{ old('details_bangla') }}</textarea>
                            @error('details_bangla')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <h5 class="text-center border-bottom">Extra Option</h5>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="form-check mb-2 mt-2">
                                <input class="form-check-input" name="breaking_news" type="checkbox" value="1"
                                    @if (old('breaking_news')) checked @endif id="breaking_news">
                                <label class="form-check-label" for="breaking_news">
                                    Breaking News
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="1" name="firstSection"
                                    @if (old('firstSection')) checked @endif id="firstSection">
                                <label class="form-check-label" for="firstSection">
                                    First Section
                                </label>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="form-check mb-2 mt-2">
                                <input class="form-check-input" type="checkbox" value="1"
                                    name="generalBigThumbnail" id="generalBigThumbnail"
                                    @if (old('generalBigThumbnail')) checked @endif>
                                <label class="form-check-label" for="generalBigThumbnail">
                                    General Big Thumbnail
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="1"
                                    @if (old('firstSectionBigThumbnail')) checked @endif name="firstSectionBigThumbnail"
                                    id="firstSectionBigThumbnail">
                                <label class="form-check-label" for="firstSectionBigThumbnail">
                                    First Section Big Thumbnail
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
    <script>
        $(document).ready(function() {
            $('#category_name').change(function() {
                var category_id = $(this).val();
                $.ajax({
                    url: '/admin/get/subcategory/' + category_id,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        var subcategory = $('#subcategory_name').empty();
                        $.each(data, function(key, value) {
                            subcategory.append('<option value="' + value.id + '">' +
                                value.subcategory_name_en + ' | ' + value
                                .subcategory_name_bn + '</option>');
                        });
                    },
                    error: function(err) {
                        console.log(err);
                    },
                });
            });

            $('#division_name').change(function() {
                var division_id = $(this).val();
                $.ajax({
                    url: '/admin/get/district/' + division_id,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        var district = $('#district_name').empty();
                        $.each(data, function(key, value) {
                            district.append('<option value="' + value.id +
                                '">' +
                                value.district_name_en + ' | ' + value
                                .district_name_bn + '</option>');
                        });
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
