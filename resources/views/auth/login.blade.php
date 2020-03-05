@extends('layouts.site')

@section('content')
<div class="container" style="display: flex;flex-direction: row;justify-content: center;
align-items: center">
    <div class="row">
        <div class="card">
            <div class="card-content">
                <div class="card-title center">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-field row ">
                            <div class="col">
                                <label for="login" class="col m4">{{ __('Login') }}</label>
                                <input id="login" type="text" class=" @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-field row">
                            <div class="col">
                                <label for="password" class="col m4 ">{{ __('Senha') }}</label>
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-field row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <span>
                                        {{ __('Manter-me Conectado') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="input-field row">
                            <div class="col s12">
                                <button type="submit" class="btn">
                                    {{ __('Login') }}
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
