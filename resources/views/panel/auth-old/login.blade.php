<!DOCTYPE html>
<html>
<head>
    <title>ModiHost</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
 {{--   <link href="{{ asset('assets/bower_components/bootstrap-validator/docs/assets/ico/favicon.png') }}"
          rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
 --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/dropzone/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('assets/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('assets/bower_components/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css?version=4.4.0') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/Gotham-Font/gothamfonts.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/Aspira/stylesheet.css') }}" rel="stylesheet">
</head>
<body class="auth-wrapper login-page">
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w wider">
        <div class="logo_img_padding">
            <a class="logo" href="javascript:;">
                <div class="logo-label text-center">
                    <img src="{{ asset('assets/img/hotel.png') }}" class="img-fluid mb-3" style="width: 63%; margin-bottom: 35px !important;">
                    <h6>Asia Inn Hotel, Tokyo (6409 A/M)</h6>
                </div>
            </a>
        </div>
        <h4 class="auth-header">
            Login Form
        </h4>
        @include('panel.includes.flash_messages')
        <form action="{{ route('login') }}" method="post" id="login-form">
            @csrf
            <div class="form-group">
                <label for="">Email</label><input name="email" class="form-control" placeholder="Enter your Email"
                                                     type="text">
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                @include('panel.includes.single_error' , ['name' => 'email'])
            </div>
            <div class="form-group">
                <label for="">Password</label><input name="password" class="form-control"
                                                     placeholder="Enter your password" type="password">
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
                @include('panel.includes.single_error' , ['name' => 'password'])
            </div>
            <div class="buttons-w">
                <button type="submit" class="btn btn-primary">Log in</button>
                <div class="form-check-inline">
                    <label class="form-check-label"><input class="form-check-input" type="checkbox">Remember Me</label>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
