{{HTML::style('/bootstrap.min_darkly.css')}}
{{HTML::style('/whatisit.css')}}
<H1>sign up in audiopedia</H1>
<div class="container">

	<div class ='col-md-offset-3 col-md-5'>
		{{Form::open(array('action' => 'UsersController@postLogin' , 'class' => 'form-signup'))}}
		{{Form::text('username', '', array('placeholder' => 'Username' , 'class' => 'form-control'))}}
		{{Form::password('password', array('class' => 'form-control' , 'placeholder' => 'Password'))}}
		{{Form::submit('LogIn', array('class' => 'btn btn-lg btn-primary btn-block'))}}

	
      <div>{{Session::get('message')}}</div>


	</div>
</div>