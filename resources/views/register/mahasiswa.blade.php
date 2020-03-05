@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register Mahasiswa</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">NIM</label>

                                <div class="col-md-6">
                                    <input id="MA_Nrp" type="text" class="form-control @error('MA_Nrp') is-invalid @enderror" name="MA_Nrp" value="{{ old('MA_Nrp') }}" required autocomplete="MA_Nrp" autofocus>

                                    @error('MA_Nrp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                                <div class="col-md-6">
                                    <input id="MA_NamaLengkap" type="text" class="form-control @error('MA_NamaLengkap') is-invalid @enderror" name="MA_NamaLengkap" value="{{ old('MA_NamaLengkap') }}" required autocomplete="MA_NamaLengkap" autofocus>

                                    @error('MA_NamaLengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Email') }}</label>

                                <div class="col-md-6">
                                    <input id="MA_Email" type="email" class="form-control @error('MA_Email') is-invalid @enderror" name="MA_Email" value="{{ old('MA_Email') }}" required autocomplete="MA_Email">

                                    @error('MA_Email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror " name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            {{ Form::hidden('role', '10') }}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
