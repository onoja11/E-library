@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="m-auto col-4">
        {{-- <div class="col-md-8"> --}}
            <div class="card  border-success  m-auto border-2 shadow-lg">
                <div class=" p-2 text-center text-success mt-1   h2 ">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="password" class="form-label text-md-end">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class=" mb-0">
                            <div class=" ">
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col-6"> --}}
                                        <button type="submit" class="btn btn-success w-100">
                                            {{ __('Login') }}
                                        </button>
                                    {{-- </div> --}}
                                    {{-- <div class="col-6"> --}}
                                        <a href="{{ route('github.login') }}" class="btn btn-dark btn-lg w-100 mt-3">
                                            <i class="fa-brands fa-github"></i> Sign In With GitHub
                                        </a>                                        
                                    {{-- </div>     --}}

                                {{-- </div> --}}

                                @if (Route::has('password.request'))
                                    <a class="btn text-warning w-100 mt-3" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>
@endsection
