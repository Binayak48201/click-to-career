#One last step
<br>
We just need you to confirm your email address to prove that you're a human. Right??
<br>
<a href="{{ url('/register/confirmation?token=') . $user->remember_token }}">
    Click here to confirm
</a>
<br>
Thanks,
<br>
