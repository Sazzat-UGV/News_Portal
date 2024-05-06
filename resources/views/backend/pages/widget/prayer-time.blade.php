@extends('backend.layouts.master')
@section('title')
    Prayer Time
@endsection
@push('admin_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    @include('backend.layouts.inc.breadcrumb', [
        'main_page' => 'Widgets',
        'sub_page' => 'Prayer Time',
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="row g-3" action="{{ route('prayerTime.widgetUpdate') }}" method="POST">
                        @csrf

                        <div class="col-6 mb-2">
                            <label for="fajr" class="form-label">Fajr<span class="text-danger">*</span></label>
                            <input type="time" name="fajr"
                                class="form-control @error('fajr')
                                 is-invalid
                                @enderror"
                                id="fajr" value="{{ old('fajr', $prayerTime->fajr) }}">
                            @error('fajr')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="dhuhr" class="form-label">Dhuhr<span class="text-danger">*</span></label>
                            <input type="time" name="dhuhr"
                                class="form-control @error('dhuhr')
                                 is-invalid
                                @enderror"
                                id="dhuhr" value="{{ old('dhuhr', $prayerTime->dhuhr) }}">
                            @error('dhuhr')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="asr" class="form-label">Asr<span class="text-danger">*</span></label>
                            <input type="time" name="asr"
                                class="form-control @error('asr')
                                 is-invalid
                                @enderror"
                                id="asr" value="{{ old('asr', $prayerTime->asr) }}">
                            @error('asr')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="maghrib" class="form-label">Maghrib<span class="text-danger">*</span></label>
                            <input type="time" name="maghrib"
                                class="form-control @error('maghrib')
                                 is-invalid
                                @enderror"
                                id="maghrib" value="{{ old('maghrib', $prayerTime->maghrib) }}">
                            @error('maghrib')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="isha_a" class="form-label">Isha'a<span class="text-danger">*</span></label>
                            <input type="time" name="isha_a"
                                class="form-control @error('isha_a')
                                 is-invalid
                                @enderror"
                                id="isha_a" value="{{ old('isha_a', $prayerTime->isha_a) }}">
                            @error('isha_a')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="jumu_ah" class="form-label">Jumu'ah</label>
                            <input type="time" name="jumu_ah"
                                class="form-control @error('jumu_ah')
                                 is-invalid
                                @enderror"
                                id="jumu_ah" value="{{ old('jumu_ah', $prayerTime->jumu_ah) }}">
                            @error('jumu_ah')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <div class="form-check mb-2 mt-2">
                                <input class="form-check-input" name="active" type="checkbox" value="1"
                                    @if (old('active')) checked
                                @elseif ($prayerTime->active == 1)
                                checked @endif
                                    id="active">
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>
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
