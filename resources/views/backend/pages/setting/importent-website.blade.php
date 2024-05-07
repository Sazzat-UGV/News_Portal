@extends('backend.layouts.master')
@section('title')
    Importent Website List
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Settings',
        'sub_page' => 'Importent Website List',
    ])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newWebsite"><i
                                class="fa-solid fa-circle-plus"></i> Add New Website Link</button>

                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Website Name</th>
                                    <th>Website Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($websites as $index => $website)
                                    <tr>
                                        <th>{{ $index + 1 }}.</th>
                                        <td>{{ $website->created_at->diffForHumans() }}</td>
                                        <td>{{ $website->website_name }}</td>
                                        <td><a target="blank"
                                                href="{{ $website->website_link }}">{{ $website->website_link }}</a></td>
                                        <td class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-warning pl-1 p-0 rounded mr-1"
                                                data-toggle="modal" data-target="#editlink{{ $website->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>

                                            <form action="{{ route('website.destroy', ['website' => $website->id]) }}"
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
                                    <div class="modal fade" id="editlink{{ $website->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Website</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('website.update', ['website' => $website->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 mb-2">
                                                                <label for="website_name" class="form-label">Website
                                                                    Name<span class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    class="form-control @error('website_name')
                                                                is-invalid
                                                                @enderror"
                                                                    id="website_name" name="website_name"
                                                                    value="{{ $website->website_name }}"
                                                                    placeholder="Enter website name">
                                                                @error('website_name')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <label for="website_link" class="form-label">Website
                                                                    Link<span class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    class="form-control @error('website_link')
                                                                is-invalid
                                                                @enderror"
                                                                    id="website_link" name="website_link"
                                                                    value="{{ $website->website_link }}"
                                                                    placeholder="Enter website link">
                                                                @error('website_link')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
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
                    <div class="modal fade" id="newWebsite" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Website</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('website.store') }}" method="POST" id="website_insert">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-12 mb-2">
                                                <label for="website_name" class="form-label">Website Name
                                                    <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('website_name')
                                            is-invalid
                                            @enderror"
                                                    id="website_name" name="website_name"
                                                    value="{{ old('website_name') }}" placeholder="Enter website name ">
                                                @error('website_name')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-2">
                                                <label for="website_link" class="form-label">Website Link
                                                    <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('website_link')
                                            is-invalid
                                            @enderror"
                                                    id="website_link" name="website_link"
                                                    value="{{ old('website_link') }}" placeholder="Enter website link ">
                                                @error('website_link')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
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

            // Event handler for elements with class .status
            $('.datatable').on('click', '.status', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var $live_text = $(this).find('.live_text');

                $.ajax({
                    url: "/admin/change/category/status/" + id,
                    method: "GET",
                    success: function(data) {
                        if ($live_text.text() === 'Active') {
                            toastr.success('Category deactivated!');
                            $live_text.text('Deactive').removeClass('bg-success').addClass(
                                'bg-danger');
                        } else {
                            toastr.success('Category activated!');
                            $live_text.text('Active').removeClass('bg-danger').addClass(
                                'bg-success');
                        }
                        console.log('done');
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endpush
