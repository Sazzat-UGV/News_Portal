@extends('backend.layouts.master')
@section('title')
    Notice
@endsection
@push('admin_style')
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
                    <div class="d-flex justify-content-end">
                        @if ($notice->active == 1)
                            <a href="{{ route('notice.changeStatus') }}" class="btn btn-danger">Deactive</a>
                        @else
                            <a href="{{ route('notice.changeStatus') }}" class="btn btn-success">Active</a>
                        @endif
                    </div>
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
                                <h6 class="text-success" style="font-size: 13px">Notice is now active</h6>
                            @else
                                <h6 class="text-danger" style="font-size: 13px">Notice is now deactive</h6>
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
