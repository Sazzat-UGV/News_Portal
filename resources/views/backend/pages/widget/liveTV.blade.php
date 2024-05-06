@extends('backend.layouts.master')
@section('title')
   Live TV
@endsection
@push('admin_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <form class="row g-3" action="{{ route('liveTV.widgetUpdate') }}" method="POST">
                        @csrf

                        <div class="col-12 mb-2">
                            <label for="embed_code" class="form-label">Embed Code</label>
                            <textarea rows="5" cols="30"
                                class="form-control @error('embed_code')
                            is-invalid
                           @enderror"
                                id="editor2" placeholder="Enter embed code" name="embed_code">{{ old('embed_code', $livetv->embed_code) }}</textarea>
                            @error('embed_code')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            @if ($livetv->active==1)
                            <a href="{{ route('liveTV.changeStatus') }}" class="btn btn-primary px-4 ml-3">Live Active</a>
                            @else
                            <a href="{{ route('liveTV.changeStatus') }}" class="btn btn-danger px-4 ml-3">Live Deactive</a>
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
