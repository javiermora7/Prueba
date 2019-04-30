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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="Apellido" type="text" class="form-control{{ $errors->has('Apellido') ? ' is-invalid' : '' }}" name="Apellido" value="{{ old('Apellido') }}" required autofocus>

                                @if ($errors->has('Apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

                            <div class="col-md-6">
                                <input id="Rut" type="text" class="form-control{{ $errors->has('Rut') ? ' is-invalid' : '' }}" name="Rut" value="{{ old('Rut') }}" required autofocus>

                                @if ($errors->has('Rut'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                         <div class="form-group row">
                            <label for="Telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="Telefono" type="text" class="form-control{{ $errors->has('Telefono') ? ' is-invalid' : '' }}" name="Telefono" value="{{ old('Telefono') }}" required autofocus>

                                @if ($errors->has('Telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="RazonSocial" class="col-md-4 col-form-label text-md-right">{{ __('RazonSocial') }}</label>

                            <div class="col-md-6">
                                <input id="RazonSocial" type="text" class="form-control{{ $errors->has('RazonSocial') ? ' is-invalid' : '' }}" name="RazonSocial" value="{{ old('RazonSocial') }}" required autofocus>

                                @if ($errors->has('RazonSocial'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('RazonSocial') }}</strong>
                                    </span>
                                @endif
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
