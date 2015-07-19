{{HTML::style('/bootstrap.min_darkly.css')}}
{{HTML::style('/whatisit.css')}}
{{HTML::script ('/post.js')}}
{{HTML::script ('/jquery.min.js')}}
{{HTML::script ('/jquery.js')}}
{{HTML::script ('/jquery-1.10.2.min.map')}}

<title>Welcome to WhatIsIt Or WII</title>

@if (Auth::check())
Welcome {{{Auth::user()->username}}}
@else
Send File by a Guest 
@endif
<p><h2>Answers</h2></p>

<p class='row col-md-3'>
	{{Form::open(array('action' => 'SearchController@getSearch' ,'id' => 'search' ,'method' => 'get'))}}
	{{Form::text('keyword', '',array('class' => 'search-input' , 'placeholder' => 'Search everywhere' , 'id' => 'keyword'))}} </p>
	{{Form::submit('Search')}}
	{{Form::close()}}

	{{--Show search--}}
	<div id='output' class='search-result' >ssss   </div>
	{{--end show search--}}

	{{-- Show  Answers --}}
<div class='col-md-offset-2 col-md-6 row' id='latest'>
	<ul class=''>
		@foreach($answers as $answer)
		<li class='list-group-item'><b>{{{$answer->title}}} </b><br><audio controls=""  name="media"><source src="./answers/{{$answer->audio}}"></audio>  </li>
		<li class ='list-group-item'> {{$answer->info}} </li>
		<li>
			{{Form::open(array('action' => array('AdminController@destroy', $answer->id)  , 'method' => 'DELETE' , 'class' => 'list-group-item'))}}
			{{Form::submit('DELETE', array('class' => 'btn-danger'))}}
			{{Form::close()}}

		</li>
		@endforeach
	</ul>
</div>

{{-- End of Answers --}}
