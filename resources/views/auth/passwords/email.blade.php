@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-sm-10 col-md-5 login-block">
        <div class="logo">
            <a href="{{url('/')}}"><img src="{{cloudfrontUrl('../images/delltech-logo.svg')}}" alt="DELL Technologies"></a>
        </div>
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-12">{{ __('E-Mail Address') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 button-block">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
