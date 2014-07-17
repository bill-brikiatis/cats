@extends('master')

@section('header')
  @if(isset($breed))
    <a href="{{URL::to('/')}}">Back to the overview</a>
  @endif
  <h2>
    All @if(isset($breed)) {{$breed}} @endif Cats
    <a href="{{URL::to('cats/create')}}" 
       class="btn btn-primary pull-right">
      Add a new cat
    </a>
  </h2>
@stop

@section('content')
  @foreach($cats as $cat)
    <div class="cat" id="cat{{$cat->id}}">
      <a href="{{URL::to('cats/'.$cat->id)}}">
        <strong> {{$cat->name}} </strong> - {{$cat->breed->name}}
      </a>
      <span class="glyphicon glyphicon-trash" id="{{$cat->id}}">Delete</span>
    </div>
  @endforeach
@stop


@section('script')
<script>
  // register event handlers after the page has been loaded
  $(document).ready(function() {
    // event handler for all trash icons
    $('.glyphicon').click(function() {

      // log what was clicked for debug purposes
      console.log(this.id);

      make_ajax_call('json/'+this.id);

      // select element with id == cat{id} and remove from the screen
      $('#cat'+this.id).remove();

    });

  });

  function make_ajax_call(url) {
    $.getJSON(url, function(response) {
      console.log(response);
    });

  }


</script>
@stop