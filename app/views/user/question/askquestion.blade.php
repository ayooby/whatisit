{{HTML::style('/bootstrap.min_darkly.css')}}
{{HTML::style('/whatisit.css')}}
<title>Ask A Question</title>
<div class="col-md-offset-1 col-md-9">
<H1>Hello Dear @if (Auth::check())
 {{{Auth::user()->username}}},
@else
 Guest, 
@endif Thanks for ask a Question</H1>
</div>
<div class="col-md-offset-3 col-md-4">
{{Form::open(array('action' => 'QuestionController@store' , 'id' =>'add-answer'))}}
<p>
{{Form::label('title', 'Title:')}}
{{Form::text('title','' , array('class' => 'form-control' , 'id' => 'title'))}}
</p>
<p>
{{Form::label('info', 'Body:')}}
{{Form::textarea('Body' , '' , array('class' => 'form-control' ,'id' => 'info'))}}
</p>
{{ Form::label('tag', 'Tags:') }} <br>
<small class="text-muted">Seperate By Commas</small>
{{Form::text('tag','' , array('class' => 'form-control' , 'id' => 'title'))}}
<br>
{{Form::submit('Ask Your Question' , array('class' => 'btn btn-lg btn-info btn-block'))}}
{{Form::reset('Reset!' , array('class' => 'btn btn-md btn-danger btn-block'))}}
{{Form::close()}}
@if($errors->has())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif
</div>
