@extends('layouts.app')

@section('content')
<h2>Add Section</h2>
<form action="{{ route('sections.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="mb-3">
    <label>Room</label>
    <input type="text" name="room" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
