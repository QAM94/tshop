@include("emails.header")

<p>Dear {{ $user }},</p>
<p>Someone with IP Address {{$_SERVER['REMOTE_ADDR']}} on {{date('jS M Y')}}  at {{date('h:i A')}} has requested
    a password reset.</p>
<p>Your New Password is: {{ $password }}</p>

@include("emails.footer")