Click here to Reset your Password:
<a href="{{$link = url('password/reset',$token).'?email='.urlencode($user->getEmailForPasswordReset())}}">{{ $link }}</a>