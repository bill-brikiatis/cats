@extends('master')

@section('header')
  <a href="{{('cats/'.$cat->id.'')}}">&larr; cancel </a>
  <h2>
    @if($method =='post')
      Add a new cat
    @elseif($method == 'delete')
      Delete {{$cat->name}}?
    @else
      Edit {{$cat->name}}
    @endif
  </h2>
@stop

@section('content')
  {{Form::model($cat, array('method' => $method, 'url' => 'cats/'.$cat->id))}}

@unless($method == 'delete')
  <div class="form-group">
    {{Form::label('Name')}}
    {{Form::text('name')}}
  </div>
  <div class="form-group">
    {{Form::label('Date of birth')}}
    {{Form::text('date_of_birth')}}
  </div>
  <div class="form-group">
    {{Form::label('breed')}}
    {{Form::text('breed_id', $breed_options)}}
  </div>

  {{Form::submit("Save", array('class'=>'btn btn-default'))}}
@else
  {{Form::submit("delete", array('class'=>'btn btn-default'))}}
@endif
  {{Form::close()}}
@stop