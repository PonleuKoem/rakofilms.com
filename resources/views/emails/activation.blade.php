<h1>Hello
	<p>please click the link bellow to activate your account</p>
	<a href="{{env('APP_URL')}}/activate/{{$user->email}}/{{$code}}">Activate Account</a>
</h1>