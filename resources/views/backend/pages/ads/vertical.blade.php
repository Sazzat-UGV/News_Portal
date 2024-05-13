@extends('backend.layouts.master')
@section('title')
    Advertisement
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
        'main_page' => 'Advertisement',
        'sub_page' => '',
    ])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newAds"><i
                                class="fa-solid fa-circle-plus"></i> Add New Ads</button>

                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Ads</th>
                                    <th>Ads Link</th>
                                    <th>Ads Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ads as $index => $ad)
                                    <tr>
                                        <th>{{ $index + 1 }}.</th>
                                        <td>{{ $ad->created_at->diffForHumans() }}</td>
                                        <td class=""><img src="{{ asset('uploads/ads') }}/{{ $ad->ads }}"
                                                alt="Ads" class="w-50 rounded"></td>
                                        <td class="wrap">{{ $ad->link }}</td>
                                        @if ($ad->type == 'vertical')
                                            <td class="wrap">Vertical</td>
                                        @elseif ($ad->type == 'horizontal')
                                            <td class="wrap">Horizontal</td>
                                        @endif
                                        <td class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-warning pl-1 p-0 rounded mr-1"
                                                data-toggle="modal" data-target="#editads{{ $ad->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>

                                            <form action="{{ route('ads.Delete', ['id' => $ad->id]) }}" method="POST"
                                                class="show_confirm">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger pl-1 p-0 rounded">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- edit category modal --}}
                                    <div class="modal fade" id="editads{{ $ad->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Ads</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('ads.Update', ['id' => $ad->id]) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">

                                                            <div class="col-12 mb-2">
                                                                <label for="type" class="form-label">Ads Type<span
                                                                        class="text-danger">*</span></label>
                                                                <select
                                                                    class="form-control @error('type') is-invalid @enderror"
                                                                    aria-label="type" name="type">
                                                                    <option value="vertical"
                                                                        @if ($ad->type == 'vertical') selected
                                                                        @elseif (old('type') == 'vertical')
                                                                        selected @endif>
                                                                        Vertical</option>
                                                                    <option value="horizontal"
                                                                        @if ($ad->type == 'horizontal') selected
                                                                        @elseif (old('type') == 'horizontal')
                                                                        selected @endif>
                                                                        Horizontal</option>
                                                                </select>
                                                                @error('type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="ads_link" class="form-label">Ads Link
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    class="form-control @error('ads_link')
                                                                is-invalid
                                                                @enderror"
                                                                    id="ads_link" name="ads_link"
                                                                    value="{{ old('ads_link', $ad->link) }}"
                                                                    placeholder="Enter ads link">
                                                                @error('ads_link')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="ads" class="form-label">Ads</label>
                                                                <input type="file" name="ads"
                                                                    data-default-file="{{ asset('uploads/ads') }}/{{ $ad->ads }}"
                                                                    class="form-control p-1  @error('ads')
                                                                       is-invalid
                                                                       @enderror">
                                                                @error('ads')
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
                    <div class="modal fade" id="newAds" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Ads</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('ads.Store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-12 mb-2">
                                                <label for="type" class="form-label">Ads Type<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control @error('type') is-invalid @enderror"
                                                    aria-label="type" name="type">
                                                    <option value="vertical"
                                                        {{ old('type') == 'vertical' ? 'selected' : '' }}>Vertical</option>
                                                    <option value="horizontal"
                                                        {{ old('type') == 'horizontal' ? 'selected' : '' }}>Horizontal
                                                    </option>
                                                </select>
                                                @error('type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label for="ads_link" class="form-label">Ads Link
                                                    <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('ads_link')
                                            is-invalid
                                            @enderror"
                                                    id="ads_link" name="ads_link" value="{{ old('ads_link') }}"
                                                    placeholder="Enter ads link ">
                                                @error('ads_link')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label for="ads" class="form-label">Ads<span
                                                        class="text-danger">*</span></label>
                                                <input type="file" name="ads"
                                                    class="form-control dropify  @error('ads')
                                                       is-invalid
                                                      @enderror">
                                                @error('ads')
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
