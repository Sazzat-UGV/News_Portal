@extends('backend.layouts.master')
@section('title')
    My Profile
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
        'main_page' => 'My Profile',
        'sub_page' => ' ',
    ])

    <div class="container">
        <div class="main-body">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('uploads/users') }}/{{ Auth::user()->image }}" alt="Admin"
                                    class="rounded-circle p-1 bg-secondary" width="160">
                                <div class="mt-3">
                                    <h4 style="font-weight: 800">{{ Auth::user()->name }}</h4>
                                    <p class="text-secondary mb-1">
                                        @if (Auth::user()->is_admin == 1)
                                            Admin
                                        @endif
                                    </p>
                                    <p class="text-muted font-size-sm">{{ Auth::user()->address }}</p>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#changeImageModal">Change Image</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card py-3">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6>{{ Auth::user()->name }}</h6>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6>{{ Auth::user()->email }}</h6>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Primary Phone:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6>{{ Auth::user()->primary_phone }}</h6>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Secondary Phone:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6>{{ Auth::user()->secondary_phone }}</h6>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6>{{ Auth::user()->address }}</h6>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date of Birth:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6>{{ Auth::user()->dob }}</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button type="button" class="btn  btn-primary" data-toggle="modal"
                                        data-target="#editModal">Edit Profile</button>
                                </div>
                                {{-- edit modal --}}

                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Profile</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.profile') }}" method="POST">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-12 mb-2">
                                                            <label for="name" class="form-label">Name<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                class="form-control @error('name')
                                                is-invalid
                                                @enderror"
                                                                id="name" name="name"
                                                                value="{{ old('name', Auth::user()->name) }}"
                                                                placeholder="Enter name">
                                                            @error('name')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 mb-2">
                                                            <label for="email" class="form-label">Email<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email"
                                                                class="form-control @error('email')
                                                is-invalid
                                                @enderror"
                                                                id="email" name="email"
                                                                value="{{ old('email', Auth::user()->email) }}"
                                                                placeholder="Enter email">
                                                            @error('email')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-6 mb-2">
                                                            <label for="primary_phone" class="form-label">Primary
                                                                Phone<span class="text-danger">*</span></label>
                                                            <input type="text"
                                                                class="form-control @error('primary_phone')
                                                is-invalid
                                                @enderror"
                                                                id="primary_phone" name="primary_phone"
                                                                value="{{ old('primary_phone', Auth::user()->primary_phone) }}"
                                                                placeholder="Enter primary phone">
                                                            @error('primary_phone')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-6 mb-2">
                                                            <label for="secondary_phone" class="form-label">Secondary
                                                                Phone</label>
                                                            <input type="text"
                                                                class="form-control @error('secondary_phone')
                                                is-invalid
                                                @enderror"
                                                                id="secondary_phone" name="secondary_phone"
                                                                value="{{ old('secondary_phone', Auth::user()->secondary_phone) }}"
                                                                placeholder="Enter secondary phone">
                                                            @error('secondary_phone')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-6 mb-2">
                                                            <label for="address" class="form-label">Address<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                class="form-control @error('address')
                                                is-invalid
                                                @enderror"
                                                                id="address" name="address"
                                                                value="{{ old('address', Auth::user()->address) }}"
                                                                placeholder="Enter address">
                                                            @error('address')
                                                                <span class="invalid-feedback"
                                                                    role="alert"><strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-6 mb-2">
                                                            <label for="dob" class="form-label">Date of Birth</label>
                                                            <input type="date"
                                                                class="form-control @error('dob')
                                                is-invalid
                                                @enderror"
                                                                id="dob" name="dob"
                                                                value="{{ old('dob', Auth::user()->dob) }}"
                                                                placeholder="Enter dob">
                                                            @error('dob')
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

                                {{-- image modal --}}
                                <div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Change Image</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.changeImage') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="file"
                                                        class="dropify @error('image')
                                                        is-invalid
                                            @enderror"
                                                        data-default-file="{{ asset('uploads/users') }}/{{ Auth::user()->image }}"
                                                        name="image" data-max-file-size="10M">
                                                    @error('image')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
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
                            </div>
                        </div>
                    </div>

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
