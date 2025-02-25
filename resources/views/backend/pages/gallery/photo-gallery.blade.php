@extends('backend.layouts.master')
@section('title')
    Photo Gallery
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .dropify-message p {
            font-size: 26px;
        }

        .wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }
    </style>
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Galleries',
        'sub_page' => 'Photo Gallery',
    ])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newPhoto"><i
                                class="fa-solid fa-circle-plus"></i> Add New Photo</button>

                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Photo</th>
                                    <th>Title Bangla</th>
                                    <th>Title English</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($photos as $index => $photo)
                                    <tr>
                                        <th>{{ $index + 1 }}.</th>
                                        <td>{{ $photo->created_at->diffForHumans() }}</td>
                                        <td class="wrap"><img
                                                src="{{ asset('uploads/photo-gallery') }}/{{ $photo->photo }}"
                                                alt="image" class="w-75 rounded"></td>
                                        <td class="wrap">{{ $photo->title_bn }}</td>
                                        <td class="wrap">{{ $photo->title_en }}</td>
                                        <td>
                                            @if ($photo->status == 1)
                                                <a href="{{ route('photo.changeStatus', ['id' => $photo->id]) }}"
                                                    class="badge bg-success">Active</a>
                                            @else
                                                <a href="{{ route('photo.changeStatus', ['id' => $photo->id]) }}"
                                                    class="badge bg-danger">Deactive</a>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-warning pl-1 p-0 rounded mr-1"
                                                data-toggle="modal" data-target="#editphoto{{ $photo->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>

                                            <form action="{{ route('photo.destroy', ['photo' => $photo->id]) }}"
                                                method="POST" class="show_confirm">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger pl-1 p-0 rounded">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- edit category modal --}}
                                    <div class="modal fade" id="editphoto{{ $photo->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Photo</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('photo.update', ['photo' => $photo->id]) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 mb-2">
                                                                <label for="title_bangla" class="form-label">Photo Title
                                                                    Bangla
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    class="form-control @error('title_bangla')
                                                                is-invalid
                                                                @enderror"
                                                                    id="title_bangla" name="title_bangla"
                                                                    value="{{ old('title_bangla', $photo->title_bn) }}"
                                                                    placeholder="Enter photo title bangla">
                                                                @error('title_bangla')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <label for="title_english" class="form-label">Photo Title
                                                                    English
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    class="form-control @error('title_english')
                                                                is-invalid
                                                                @enderror"
                                                                    id="title_english" name="title_english"
                                                                    value="{{ old('title_english', $photo->title_en) }}"
                                                                    placeholder="Enter photo title english">
                                                                @error('title_english')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <label for="photo" class="form-label">Photo</label>
                                                                <input type="file" name="photo"
                                                                    data-default-file="{{ asset('uploads/photo-gallery') }}/{{ $photo->photo }}"
                                                                    class="form-control p-1  @error('photo')
                                                                       is-invalid
                                                                       @enderror">
                                                                @error('photo')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect "
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light ">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    {{-- add category modal --}}
                    <div class="modal fade" id="newPhoto" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Photo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('photo.store') }}" method="POST" id="website_insert"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-12 mb-2">
                                                <label for="title_bangla" class="form-label">Photo Title Bangla
                                                    <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('title_bangla')
                                            is-invalid
                                            @enderror"
                                                    id="title_bangla" name="title_bangla"
                                                    value="{{ old('title_bangla') }}"
                                                    placeholder="Enter photo title bangla ">
                                                @error('title_bangla')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label for="title_english" class="form-label">Photo Title English
                                                    <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('title_english')
                                            is-invalid
                                            @enderror"
                                                    id="title_english" name="title_english"
                                                    value="{{ old('title_english') }}"
                                                    placeholder="Enter photo title engliish ">
                                                @error('title_english')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>


                                            <div class="col-12 mb-2">
                                                <label for="photo" class="form-label">Photo<span
                                                        class="text-danger">*</span></label>
                                                <input type="file" name="photo"
                                                    class="form-control dropify @error('photo')
                                                       is-invalid
                                                      @enderror">
                                                @error('photo')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect "
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@push('admin_script')
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            new DataTable('#example', {
                pagingType: 'simple_numbers'
            });

            // Event handler for elements with class .show_confirm
            $('.datatable').on('click', '.show_confirm', function(event) {
                event.preventDefault();
                let form = $(this).closest('form');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        form.submit();
                    } else {
                        Swal.fire({
                            title: "Canceled!",
                        });
                    }
                });
            });

        });
    </script>
@endpush
