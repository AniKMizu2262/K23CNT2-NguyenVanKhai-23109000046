@extends('nvkLayouts.Admins.Master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('nvkLogin') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nvkTaiKhoan" class="form-label">{{ __('Email Address') }}</label>
                            <input id="nvkTaiKhoan" type="text" class="form-control @error('nvkTaiKhoan') is-invalid @enderror" name="nvkTaiKhoan" value="{{ old('nvkTaiKhoan') }}" required autofocus>

                            @error('nvkTaiKhoan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvkMatKhau" class="form-label">{{ __('Password') }}</label>
                            <input id="nvkMatKhau" type="password" class="form-control @error('nvkMatKhau') is-invalid @enderror" name="nvkMatKhau" required>

                            @error('nvkMatKhau')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection