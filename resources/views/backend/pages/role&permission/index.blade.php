@extends('backend.layouts.master')
@section('title')
    Permission List
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
        'main_page' => 'Role & Permission',
        'sub_page' => 'Permission List',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('role.create') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>
                            Add New
                            Permission</a>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table table- datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Admin Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <th>{{ $index + 1 }}.</th>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td class="wrap">{{ $user->name }}</td>
                                        <td class="wrap">{{ $user->email }}</td>
                                        <td class="wrap">
                                            @if ($user->category == 1)
                                                <span class="badge bg-success">
                                                    Category
                                                </span>
                                            @endif
                                            @if ($user->subcategory == 1)
                                                <span class="badge bg-success">
                                                    Subcategory
                                                </span>
                                            @endif
                                            @if ($user->division == 1)
                                                <span class="badge bg-success">
                                                    Division
                                                </span>
                                            @endif
                                            @if ($user->district == 1)
                                                <span class="badge bg-success">
                                                    District
                                                </span>
                                            @endif
                                            @if ($user->post == 1)
                                                <span class="badge bg-success">
                                                    Post
                                                </span>
                                            @endif
                                            @if ($user->widget == 1)
                                                <span class="badge bg-success">
                                                    Widget
                                                </span>
                                            @endif
                                            @if ($user->ads == 1)
                                                <span class="badge bg-success">
                                                    Ads
                                                </span>
                                            @endif
                                            @if ($user->permission == 1)
                                                <span class="badge bg-success">
                                                    Permission
                                                </span>
                                            @endif
                                            @if ($user->gallery == 1)
                                                <span class="badge bg-success">
                                                    Gallery
                                                </span>
                                            @endif
                                            @if ($user->setting == 1)
                                                <span class="badge bg-success">
                                                    Setting
                                                </span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('role.edit', ['role' => $user->id]) }}"
                                                class="btn btn-warning  pl-1 p-0 rounded mr-1"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                            <form action="{{ route('role.destroy', ['role' => $user->id]) }}" method="POST"
                                                class="show_confirm">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger pl-1 p-0 rounded">
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
