@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="RUT" class="col-md-4 col-form-label text-md-right">{{ __('RUT') }}</label>
                            <div class="col-md-6">
                                <input id="RUT" type="text" class="form-control @error('RUT') is-invalid @enderror" name="RUT" value="{{ old('RUT') }}" required autocomplete="RUT" >
                                @error('RUT')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="verificador" class="col-md-4 col-form-label text-md-right">{{ __('verificador') }}</label>
                            <div class="col-md-6">
                                <input id="verificador" type="text" class="form-control @error('verificador') is-invalid @enderror" name="verificador" value="{{ old('verificador') }}" required autocomplete="verificador" >
                                @error('verificador')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="Nombre" type="text" class="form-control @error('Nombre') is-invalid @enderror" name="Nombre" value="{{ old('Nombre') }}" required autocomplete="Nombre" autofocus>
                                @error('Nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ApellidoPaterno" class="col-md-4 col-form-label text-md-right">{{ __('ApellidoPaterno') }}</label>
                            <div class="col-md-6">
                                <input id="ApellidoPaterno" type="text" class="form-control @error('ApellidoPaterno') is-invalid @enderror" name="ApellidoPaterno" value="{{ old('ApellidoPaterno') }}" required autocomplete="ApellidoPaterno" >
                                @error('ApellidoPaterno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ApellidoMaterno" class="col-md-4 col-form-label text-md-right">{{ __('ApellidoMaterno') }}</label>
                            <div class="col-md-6">
                                <input id="ApellidoMaterno" type="text" class="form-control @error('ApellidoMaterno') is-invalid @enderror" name="ApellidoMaterno" value="{{ old('ApellidoMaterno') }}" required autocomplete="ApellidoMaterno" >
                                @error('ApellidoMaterno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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

                        <div class="form-group row">
                            <label for="TipoUsuario" class="col-md-4 col-form-label text-md-right">{{ __('TipoUsuario') }}</label>
                            <div class="col-md-6">
                                <input id="TipoUsuario" type="text" class="form-control @error('TipoUsuario') is-invalid @enderror" name="TipoUsuario" value="{{ old('TipoUsuario') }}" required autocomplete="TipoUsuario" >
                                @error('TipoUsuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                            <div class="col-md-6">
                                <input id="Estado" type="text" class="form-control @error('Estado') is-invalid @enderror" name="Estado" value="{{ old('Estado') }}" required autocomplete="Estado" >
                                @error('Estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
