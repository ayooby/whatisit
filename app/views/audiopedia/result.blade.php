<p>Searching for {{$keyword}} </p>
@if ($answers== "[]")
nothing to display
@endif
@foreach ($answers as $answer)
	{{$answer->title}}
	{{$answer->info}}
	{{$answer->audio}}
	<p></p>
	{{-- expr --}}
@endforeach
