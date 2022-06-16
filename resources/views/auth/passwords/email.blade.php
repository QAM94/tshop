<!DOCTYPE html>
<html>
@include('panel.includes.head')
<body class="page-profile">
<form class="sign-in-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="wd-100p">
            <h3 class="tx-color-01 mg-b-5 text-center">Forgot Password?</h3>
            <p class="tx-color-03 tx-16 mg-b-40 text-center">Enter your email address and we will send you a link to
                reset your password.</p>

            <div class="form-group">
                <label>Enter username or email address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus
                       placeholder="Email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">
                {{ __('Send Password Reset Link') }}
            </button>
            <a href="{{ route('login') }}" style="float: right; color:#10b759 !important"
               class="nav-aside nav-link active">
                << Back to Login</a>
        </div>
    </div>
</form>
</body>
</html>
