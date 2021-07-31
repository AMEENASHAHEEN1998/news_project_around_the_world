@extends('layouts.app')

@section('content')
<!--
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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
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
-->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">{{ trans('auth.register') }}</h2>
                <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="fa fa-user" aria-hidden="true"></i></label>
                        <input type="text" name="name" id="name" placeholder="{{ trans('auth.name') }}"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i></label>
                        <input type="email" name="email" id="email" placeholder="{{ trans('auth.email') }}"/>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fa fa-unlock-alt" aria-hidden="true"></i></label>
                        <input type="password" name="password" id="password" placeholder="{{ trans('auth.password') }}"/>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation"><i class="fa fa-unlock-alt" aria-hidden="true"></i></label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ trans('auth.repeat_password') }}"/>
                    </div>
                    {{-- <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div> --}}
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="{{ trans('auth.register') }}"/>
                    </div>
                    <input type="hidden" name="Status" value="مفعل">
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ asset('assets/login/images/signup-image.jpg') }}" alt="sing up image"></figure>
                <a href="{{ route('login') }}" class="signup-image-link">{{ trans('auth.member') }}</a>
            </div>
        </div>
    </div>
</section>
@endsection
