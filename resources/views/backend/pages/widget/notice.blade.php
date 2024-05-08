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
                            <label for="notice_bangla" class="form-label">Notice Bangla<span class="text-danger">*</span></label>
                            <input type="text" name="notice_bangla"
                                class="form-control @error('notice_bangla')
                                 is-invalid
                                @enderror"
                                id="notice_bangla" value="{{ old('notice_bangla', $notice->notice_bn) }}">
                            @error('notice_bangla')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="col-12 mb-2">
                            <label for="notice_english" class="form-label">Notice English<span class="text-danger">*</span></label>
                            <input type="text" name="notice_english"
                                class="form-control @error('notice_english')
                                 is-invalid
                                @enderror"
                                id="notice_english" value="{{ old('notice_english', $notice->notice_en) }}">
                            @error('notice_english')
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
