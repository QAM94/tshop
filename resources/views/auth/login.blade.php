<!DOCTYPE html>
<html>
@include('panel.includes.head')
<body class="page-profile">

<form class="sign-in-form" action="{{ route('login') }}" method="post">
    @include('panel.includes.flash_messages')
    @csrf
    <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
        @include('panel.includes.single_error' , ['name' => 'inactive'])
        <div class="wd-100p">
            <h3 class="tx-color-01 mg-b-5 text-center">Sign In</h3>
            <p class="tx-color-03 tx-16 mg-b-40 text-center">Welcome! Please Login to Continue.</p>

            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
                @include('panel.includes.single_error' , ['name' => 'email'])
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                    <label class="mg-b-0-f">Password</label>
                    <a href="{{ route('password.update') }}" class="tx-13 text-success">Forgot password?</a>
                </div>
                <input type="password" class="form-control" name="password"  placeholder="Password">
                @include('panel.includes.single_error' , ['name' => 'password'])
            </div>
            <button type="submit" class="btn btn-success btn-block pt-10">Sign In</button>
        </div>
    </div>
</form>
@include('panel.includes.scripts')
</body>
</html>
