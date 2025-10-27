@extends('layouts.app')

@section('content')
<h2>Add Student</h2>
<form action="{{ route('students.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label>Section</label>
    <select name="section_id" class="form-control">
      @foreach($sections as $section)
      <option value="{{ $section->id }}">{{ $section->name }}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
