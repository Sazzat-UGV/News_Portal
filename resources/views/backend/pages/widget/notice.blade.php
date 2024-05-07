@extends('backend.layouts.master')
@section('title')
    Notice
@endsection
@push('admin_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Widgets',
        'sub_page' => 'Notice',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('notice.widgetUpdate') }}" method="POST">
                        @csrf

                        <div class="col-12 mb-2">
                            <label for="notice" class="form-label">Notice<span class="text-danger">*</span></label>
                            <input type="text" name="notice"
                                class="form-control @error('notice')
                                 is-invalid
                                @enderror"
                                id="notice" value="{{ old('notice', $notice->notice) }}">
                            @error('notice')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if ($notice->active == 1)
                                <h6 class="text-success" style="font-size: 12px">Notice is now active</h6>
                            @else
                                <h6 class="text-danger" style="font-size: 12px">Notice is now deactive</h6>
                            @endif
                        </div>
                        <div class="col-6 mb-2">
                            @if ($notice->active == 1)
                                <a href="{{ route('notice.changeStatus') }}" class="btn btn-danger px-4 ml-3">
                                    Deactive</a>
                            @else
                                <a href="{{ route('notice.changeStatus') }}" class="btn btn-primary px-4 ml-3">
                                    Active</a>
                            @endif
                        </div>

                        <div class="col-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
