@extends('template.default')

@section('title', 'Home')

@section('content')
<h1 class="p-3 text-center text-light">Events</h1>
<div id="events__container">
  <table class="table table-dark text-center" border="1">
    <thead class="table-dark">
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
          <button class="joinButton btn btn-success" data-id=" {{ $data->_id    }}">Join</button>
          |
          <button class="viewButton btn btn-secondary" data-id="{{ $data->_id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary-subtle">
          <h1 class="event-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Event by: <span class="event-by"></span></p>
          <p>Venue: <span class="venue"></span></p>
          <p>Starting On: <span class="starting-on"></span></p>
          <p>Participants: <span class="participants"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="{{ asset('assets/javascript/bootstrap.min.js') }}"></script>
<script>
  $('.joinButton').click(function(e) {
    e.preventDefault();
    const url = "{{ route('join.event') }}";
    $.ajax({
      type: "PUT",
      url: url,
      data: {
        '_token': "{{csrf_token()}}",
        'id': e.target.dataset.id
      },

      success: function(data) {
        alert(data);
      }
    })
  })

  $('.viewButton').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      data: {
        '_token': "{{csrf_token()}}",
        'id': e.target.dataset.id
      },

      success: function(event) {
        $('.event-title').text(event.event_name)
        $('.event-by').text(event.event_by);
        $('.venue').text(event.venue);
        $('.starting-on').text(event.starting_on);
        $('.participants').text(event.participants.length);
      }
    })
  })
</script>
@endsection