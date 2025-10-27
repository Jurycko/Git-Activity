@extends('layouts.app')

@section('content')
<h2>Edit Section</h2>
<form action="{{ route('sections.update', $section->id) }}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ $section->name }}" class="form-control">
  </div>
  <div class="mb-3">
    <label>Room</label>
    <input type="text" name="room" value="{{ $section->room }}" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
