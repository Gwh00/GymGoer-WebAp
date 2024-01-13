@extends('layout3')

@section('content')
    <br>
    <div class="container" style="width:40%;">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4;"
                style="background-color:white; padding:10px 50px; border-radius:30px;
                font-family:Georgia;">
                <h1 style=" color:black;">Login</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="container" style="background: linear-gradient(to right, grey 5%, black 40%); width:40%;">
    <br>
        <br>
        <center>
            <div class="container-center" style="width:500px;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
<div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ ('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row mb-4">
                        <div class="col-md-11 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ ('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
<div class="row mb-0">
                        <div class="col-md-12 offset-md-4">
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <button type="submit" class="btn btn-primary">
                                {{ ('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ ('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </center>
    <br>
        <br>
    </div>
@endsection