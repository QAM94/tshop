@include("emails.header")

<p>Dear User</p>
<p>{{ $user_name }} has invited you to Join Us</p>
<p>Please <a href="{{route('web.register')}}" target="_blank">Click Here!</a> to signup</p>
<p>Your referral code is: {{ $referral_code }} </p>

@include("emails.footer")



