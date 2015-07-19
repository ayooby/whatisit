{{HTML::style('/bootstrap.min_darkly.css')}}
{{HTML::style('/whatisit.css')}}
<title>Create a new WhIi</title>
<div class="col-md-offset-1 col-md-9">
<H1>Hello Dear @if (Auth::check())
 {{{Auth::user()->username}}},
@else
 Guest, 
@endif Thanks for Making an AudioPedia</H1>
</div>
<div class="col-md-offset-3 col-md-4">
{{Form::open(array('action' => 'AnswerController@store' ,'files' => true , 'id' =>'add-answer'))}}
<p>
{{Form::label('title', 'Title:')}}
{{Form::text('title','' , array('class' => 'form-control' , 'id' => 'title'))}}
</p>
<p>
{{Form::label('info', 'Info:')}}
{{Form::textarea('info' , '' , array('class' => 'form-control' ,'id' => 'info'))}}
</p>
{{ Form::label('audio', 'Choose an Audio') }} 
{{ Form::file('audio','' , array('class' => 'form-control' ,'id' => 'audio')) }}

<br>
{{Form::submit('Create' , array('class' => 'btn btn-lg btn-info btn-block'))}}
{{Form::reset('Reset!' , array('class' => 'btn btn-md btn-danger btn-block'))}}
{{Form::close()}}
@if($errors->has())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif
</div>
