@extends('template.default')

@section('title', 'Manage Events')

@section('content')
<form action="{{ route('create.event') }}" method="post">
  @csrf
  <div class="mb-3">
    <label class="form-label text-light" for="event_name">Event Name: </label>
    <input class="form-control" type="text" name="event_name" id="event_name">
  </div>
  <div class="mb-3">
    <label class="form-label text-light" for="venue">Venue: </label>
    <input class="form-control" type="text" name="venue" id="venue">
  </div>
  <div class="mb-3">
    <label class="form-label text-light" for="starting_on">Starting On: </label>
    <input class="form-control" type="date" name="starting_on" id="starting_on">
  </div>
  <button class="btn btn-success">Submit</button>
</form>
<h1 class="p-3 text-center text-light">Your Events</h1>
<div id="events__container">
  <table class="table table-dark text-center" border="1">
    <thead>
      <tr>
        <th>Event Name</th>
        <th>Event By</th>
        <th>Venue</th>
        <th>Starting On</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="table-secondary">
      @foreach ($events as $key => $data)
      <tr>
        <td>{{$data->event_name}}</td>
        <td>{{$data->event_by}}</td>
        <td>{{$data->venue}}</td>
        <td>{{$data->starting_on}}</td>
        <td>
          <button class="editButton btn btn-info" data-id="{{ $data->_id }}">Edit</button>
          |
          <button class="deleteButton btn btn-danger" data-id="{{ $data->_id }}">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script>
  $('.editButton').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "{{ route('get.event.info'); }}",
      data: {
        '_token': "{{csrf_token()}}",
        'id': e.target.dataset.id
      },

      success: function(data) {
        window.location.href = `{{ route('edit.event.page') }}?id=${data._id}&event_name=${data.event_name}&venue=${data.venue}&starting_on=${data.starting_on}`
      }
    });
  });

  $('.deleteButton').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: "DELETE",
      url: "{{ route('delete.event'); }}",
      data: {
        '_token': "{{csrf_token()}}",
        'id': e.target.dataset.id
      },

      success: function(data) {
        console.log("Delete success!");
        window.location.href = "{{ route('manage.events') }}"
      }
    });
  })
</script>
@endsection