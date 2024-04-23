@extends('backend.layouts.master')
@section('title')
    Post List
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
        'main_page' => 'Posts',
        'sub_page' => 'Post List',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>
                            Add New
                            Post</a>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table table- datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $index => $post)
                                    <tr>
                                        <th>{{ $index + 1 }}.</th>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                        <td class="wrap">{{ $post->category->category_name_en }}</td>
                                        <td class="wrap">
                                            @if (isset($post->subcategory->subcategory_name_en))
                                                {{ $post->subcategory->subcategory_name_en }}
                                            @endif
                                        </td>
                                        <td class="wrap"><img
                                                src="{{ asset('uploads/thumbnail') }}/{{ $post->thumbnail }}" alt="image"
                                                class="w-50 rounded"></td>
                                        <td class="wrap">{{ $post->title_en }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('post.edit', ['post' => $post->id]) }}"
                                                class="btn btn-warning  pl-1 p-0 rounded mr-1"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                            <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST"
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
