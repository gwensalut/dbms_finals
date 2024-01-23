@extends('template.default')

@section('title', 'View')

@section('content')
<form action="{{ route('edit.event') }}" method="post">
  @csrf
  <div class="mb-3">
    <label class="form-label text-light" for="id">ID: </label>
    <input class="form-control" type="text" name="id" id="id" readonly value="{{ $_GET['id'] }}">
  </div>
  <div class="mb-3">
    <label class="form-label text-light" for="event_name">Event Name: </label>
    <input class="form-control" type="text" name="event_name" id="event_name" value="{{ $_GET['event_name'] }}">
  </div>
  <div class="mb-3">
    <label class="form-label text-light" for="venue">Venue: </label>
    <input class="form-control" type="text" name="venue" id="venue" value="{{ $_GET['venue'] }}">
  </div>
  <div class="mb-3">
    <label class="form-label text-light" for="starting_on">Starting On: </label>
    <input class="form-control" type="date" name="starting_on" id="starting_on" value="{{ $_GET['starting_on'] }}">
  </div>
  <button class="editButton btn btn-success">Submit</button>
</form>
@endsection