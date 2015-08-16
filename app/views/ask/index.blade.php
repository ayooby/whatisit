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

	

	{{-- Show  Answers --}}
<div class='col-md-offset-2 col-md-6 row' id='latest'>
	<div class="list-group">
		@foreach($questions as $question)

							
	{{(link_to_action('AnswerController@getAnswer' , $question->title , array($question->id) , array('class' => 'list-group-item active')))}}

    		<a href="#" class="list-group-item">
				{{$question->body}}
    		</a>

			<div class="list-group-item">
		
			
				@foreach ($question->tags as $tag)
				<a href="#">{{{$tag->title}}}</a> 
				@endforeach
			
			</div>
			
		@endforeach
	</div>
	</div>
    			
	

{{-- End of Answers --}}
