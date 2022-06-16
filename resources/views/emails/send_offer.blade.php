@include("emails.header")

<p>Dear {{ $user }},</p>
<p>Thank you for joining us.</p>
<p>We're grateful to take you onboard. Your salary offer is {{$offer}}</p>

@include("emails.footer")



