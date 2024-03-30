@extends('template/templateMain')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
        <div class="card">
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('loginVerify') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        <p class="mt-3 mb-0">Don't have an account? <a href="{{ route('registerForm') }}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
