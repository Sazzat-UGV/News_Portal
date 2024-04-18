@extends('backend.layouts.master')
@section('title')
    District List
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
        'main_page' => 'Districts',
        'sub_page' => 'District List',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('district.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>Add New
                            District</a>

                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table table- datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Division</th>
                                    <th>District Name English</th>
                                    <th>District Name Bangla</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($districts as $index => $district)
                                    <tr>
                                        <th>{{ $index + 1 }}.</th>
                                        <td>{{ $district->created_at->diffForHumans() }}</td>
                                        <td class="wrap">{{ $district->division->division_name_en }}</td>
                                        <td class="wrap">{{ $district->district_name_en }}</td>
                                        <td class="wrap">{{ $district->district_name_bn }}</td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('district.edit', ['district' => $district->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>

                                            <form action="{{ route('district.destroy', ['district' => $district->id]) }}"
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

        });
    </script>
@endpush
