@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>
<form action="{{ route('students.update', $student->id) }}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ $student->name }}" class="form-control">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ $student->email }}" class="form-control">
  </div>
  <div class="mb-3">
    <label>Section</label>
    <select name="section_id" class="form-control">
      @foreach($sections as $section)
      <option value="{{ $section->id }}" {{ $student->section_id == $section->id ? 'selected' : '' }}>
        {{ $section->name }}
      </option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
