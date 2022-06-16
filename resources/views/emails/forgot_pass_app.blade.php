@include("emails.header")

<p>Dear {{ $user }},</p>
<p>Someone with IP Address {{$_SERVER['REMOTE_ADDR']}} on {{date('jS M Y')}}  at {{date('h:i A')}} has requested
    a password reset,<br/>
    the following is your reset token: </p>
<p>{{ $reset_token }}</p>

@include("emails.footer")