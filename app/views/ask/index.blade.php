{{HTML::style('/bootstrap.min_darkly.css')}}
{{HTML::style('/whatisit.css')}}
{{HTML::script ('/post.js')}}
{{HTML::script ('/jquery.min.js')}}
{{HTML::script ('/jquery.js')}}
{{HTML::script ('/jquery-1.10.2.min.map')}}

<title>Welcome to WhatIsIt Or WII</title>

{{-- List all of the Questions --}}

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


			{{(link_to_action('AnswerController@getAnswer' , $question->title , $question->id, array('class' => 'list-group-item active')))}}

			<a href="#" class="list-group-item">
				{{$question->body}}
			</a>
			{{-- Display Tags --}}
			<div class="list-group-item">
				{{-- Like Dislike --}}
				@foreach ($question->tags as $tag)
				<a href="#" class="btn btn-info btn-xs">{{{$tag->title}}}</a> 
				@endforeach
				<div class="col-md-2">
					<a href="{{action('RatesController@getRate', array($question->id,'1'))}}">
						<button type="button" class="btn btn-primary btn-sm">		
							<span class="glyphicon glyphicon-thumbs-up"></span>
						</button>
					</a>
					<span class="badge"></span>
					<a href="{{action('RatesController@getRate', array($question->id,'-1'))}}">
						<button type="button" class="btn btn-default btn-sm">		
							<span class="glyphicon glyphicon-thumbs-down"></span>
						</button>
					</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>

	

	{{-- End of Answers --}}
