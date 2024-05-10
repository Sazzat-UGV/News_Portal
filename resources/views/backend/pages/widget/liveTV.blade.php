@extends('backend.layouts.master')
@section('title')
    Live TV
@endsection
@push('admin_style')
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Widgets',
        'sub_page' => 'Live TV',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-end">
                        @if ($livetv->active == 1)
                            <a href="{{ route('liveTV.changeStatus') }}" class="btn btn-danger">Deactive</a>
                        @else
                            <a href="{{ route('liveTV.changeStatus') }}" class="btn btn-success">Active</a>
                        @endif
                    </div>
                    <form class="row g-3" action="{{ route('liveTV.widgetUpdate') }}" method="POST">
                        @csrf

                        <div class="col-12 mb-2">
                            <label for="embed_code" class="form-label">Embed Code <span style="font-weight: 800;">( W=20,
                                    H=200)</span><span class="text-danger">*</span></label>
                            <textarea rows="3" cols="30"
                                class="form-control @error('embed_code')
                            is-invalid
                            @enderror"
                                id="editor2" placeholder="Enter embed code" name="embed_code">{{ old('embed_code', $livetv->embed_code) }}</textarea>
                            @error('embed_code')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if ($livetv->active == 1)
                                <h6 class="text-success" style="font-size: 13px">Live is now active</h6>
                            @else
                                <h6 class="text-danger" style="font-size: 13px">Live is now deactive</h6>
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
