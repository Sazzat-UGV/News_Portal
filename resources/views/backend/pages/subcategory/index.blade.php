@extends('backend.layouts.master')
@section('title')
    Subcategory List
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <style>
        .wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }
    </style>
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Subcategories',
        'sub_page' => 'Subcategory List',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('subcategory.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>Add New
                            Subcategory</a>

                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table table- datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Subcategory Name English</th>
                                    <th>Subcategory Name Bangla</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $index => $subcategory)
                                    <tr>
                                        <th>{{ $index + 1 }}.</th>
                                        <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                                        <td class="wrap">{{ $subcategory->category->category_name_en }}</td>
                                        <td class="wrap">{{ $subcategory->subcategory_name_en }}</td>
                                        <td class="wrap">{{ $subcategory->subcategory_name_bn }}</td>
                                        <td class="wrap">
                                            @if ($subcategory->status == 1)
                                                <a href="#" data-id="{{ $subcategory->id }}" class="status">
                                                    <span
                                                        class="live_text badge text-white px-1  rounded-pill bg-success">Active</span>
                                                </a>
                                            @else
                                                <a href="#" data-id="{{ $subcategory->id }}" class="status">
                                                    <span
                                                        class="live_text badge text-white px-1  rounded-pill bg-danger">Deactive</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('subcategory.edit', ['subcategory' => $subcategory->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                            <form
                                                action="{{ route('subcategory.destroy', ['subcategory' => $subcategory->id]) }}"
                                                method="POST" class="show_confirm">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
@push('admin_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                    url: "/admin/change/subcategory/status/" + id,
                    method: "GET",
                    success: function(data) {
                        if ($live_text.text() === 'Active') {
                            toastr.success('Subcategory deactivated!');
                            $live_text.text('Deactive').removeClass('bg-success').addClass(
                                'bg-danger');
                        } else {
                            toastr.success('Subcategory activated!');
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
