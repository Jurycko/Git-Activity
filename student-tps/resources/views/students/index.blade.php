@extends('layouts.app')

@section('content')
<h2>Students</h2>
<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

<table class="table table-bordered">
  <tr><th>ID</th><th>Name</th><th>Email</th><th>Section</th><th>Action</th></tr>
  @foreach($students as $student)
  <tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->email }}</td>
    <td>{{ $student->section->name }}</td>
    <td>
      <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
      <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button class="btn btn-danger btn-sm">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection
