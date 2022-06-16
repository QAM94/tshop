@include("emails.header")

<p>Dear {{ $user }},</p>
<p>Thank you for joining Recall Safe. Please <a target="_blank" href = "{{ url('/') }}"> Click Here to Login </a></p>
<p>Your Email is {{ $email }}</p>
<p>Your Password is {{ $password }}</p>

@include("emails.footer")



