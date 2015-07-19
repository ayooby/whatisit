{{HTML::style('/bootstrap.min_darkly.css')}}
{{HTML::style('/whatisit.css')}}
<H1>sign up in audiopedia</H1>
<div class="container">

	<div class ='col-md-offset-3 col-md-5'>
		{{Form::open(array('action' => 'UsersController@postSignup' , 'class' => 'form-signup'))}}
		{{Form::text('username', '', array('placeholder' => 'Username' , 'class' => 'form-control'))}}
		{{Form::text('email', '', array('placeholder' => 'E-Mail' , 'class' => 'form-control'))}}
		{{Form::password('password', array('class' => 'form-control' , 'placeholder' => 'Password'))}}
		{{Form::password('password-again', array('class' => 'form-control' , 'placeholder' => 'Retype Password'))}}
		{{Form::submit('Sign Me UP!', array('class' => 'btn btn-lg btn-primary btn-block'))}}

		@if($errors->has())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif

	</div>
</div>