<!DOCTYPE html>
<html>
@include('panel.includes.head')
<body class="page-profile">
<form class="sign-in-form" method="POST" action="{{ route('password.update') }}">
    @csrf
    <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="wd-100p">
            <h3 class="tx-color-01 mg-b-5 text-center">Reset Your Password</h3>
            <p class="tx-color-03 tx-16 mg-b-40 text-center">Enter your New Password.</p>
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password">
                </div>
            </div>
            <button type="submit" class="btn btn-success">{{ __('Reset Password') }}</button>
            <a href="{{ route('login') }}" style="float: right; color:#10b759 !important"
               class="nav-aside nav-link active"><< Back to Login</a>
        </div>
    </div>
</form>
</body>
</html>
