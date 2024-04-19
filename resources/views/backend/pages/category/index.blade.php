@extends('backend.layouts.master')
@section('title')
    Category List
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Categories',
        'sub_page' => 'Category List',
    ])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCategory"><i
                                class="fa-solid fa-circle-plus"></i> Add New Category</button>

                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Category Name English</th>
                                    <th>Category Name Bangla</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <th>{{ $index + 1 }}.</th>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>{{ $category->category_name_en }}</td>
                                        <td>{{ $category->category_name_bn }}</td>
                                        <td>
                                            @if ($category->status == 1)
                                                <a href="#" data-id="{{ $category->id }}" class="status">
                                                    <span
                                                        class="live_text badge text-white px-1  rounded-pill bg-success">Active</span>
                                                </a>
                                            @else
                                                <a href="#" data-id="{{ $category->id }}" class="status">
                                                    <span
                                                        class="live_text badge text-white px-1  rounded-pill bg-danger">Deactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-warning pl-1 p-0 rounded mr-1"
                                                data-toggle="modal" data-target="#editCategory{{ $category->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>

                                            <form action="{{ route('category.destroy', ['category' => $category->id]) }}"
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
                                    <div class="modal fade" id="editCategory{{ $category->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Category</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('category.update', ['category' => $category->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 mb-2">
                                                                <label for="category_name_english"
                                                                    class="form-label">Category Name
                                                                    English<span class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    class="form-control @error('category_name_english')
                                                                is-invalid
                                                                @enderror"
                                                                    id="category_name_english" name="category_name_english"
                                                                    value="{{ $category->category_name_en }}"
                                                                    placeholder="Enter category name english">
                                                                @error('category_name_english')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="category_name_bangla"
                                                                    class="form-label">Category Name
                                                                    Bangla<span class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    class="form-control @error('category_name_bangla')
                                                                is-invalid
                                                                @enderror"
                                                                    id="category_name_bangla" name="category_name_bangla"
                                                                    value="{{ $category->category_name_bn }}"
                                                                    placeholder="Enter category name bangla">
                                                                @error('category_name_bangla')
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
                    <div class="modal fade" id="newCategory" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('category.store') }}" method="POST" id="category_insert">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-12 mb-2">
                                                <label for="category_name_english" class="form-label">Category Name
                                                    English<span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('category_name_english')
                                            is-invalid
                                            @enderror"
                                                    id="category_name_english" name="category_name_english"
                                                    value="{{ old('category_name_english') }}"
                                                    placeholder="Enter category name english">
                                                @error('category_name_english')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label for="category_name_bangla" class="form-label">Category Name
                                                    Bangla<span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('category_name_bangla')
                                            is-invalid
                                            @enderror"
                                                    id="category_name_bangla" name="category_name_bangla"
                                                    value="{{ old('category_name_bangla') }}"
                                                    placeholder="Enter category name bangla">
                                                @error('category_name_bangla')
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
