@extends('layouts.master')
@section('content')


    <a class="btn btn-primary m-2 " href=" {{ route('students.create') }} " role="button">Add student</a>
@if($students->count() == 0)
        <div class="alert alert-light text-center" role="alert">
            <strong>Sorry </strong> There are no students yet
        </div>
    @else

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">University ID</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  @foreach ($students as $student)
    <tr>
      <th>{{ $student->id }}</th>
      <td>{{ $student->name }}</td>
      <td>{{ $student->uni_id }}</td>
      <td>{{ $student->phone!=null ? $student->phone : 'no Phone Number' }}</td>
      <td>{{ $student->created_at!=null ? $student->created_at : 'no Data' }}</td>
      <td>{{ $student->updated_at }}</td>
      <td>
        <a href="{{route('students.edit',$student)}}" class="btn btn-sm btn-secondary">edit</a>
        <a href="{{route('students.show',$student)}}" class="btn btn-sm btn-secondary">Show</a>
        <form method="POST" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Are you sure you want to delete this student?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
      </form>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
{{ $students->links() }}
    @endif
@endsection