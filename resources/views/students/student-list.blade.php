@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="d-flex justify-content-between">
      <h3>Student List</h3>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add
      </button>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Subject</th>
            <th scope="col">Mark</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (!blank($students))
            @foreach ($students as $student)
              <tr>
                <th scope="row">{{ $student->name }}</th>
                <td>{{ $student->subject }}</td>
                <td>{{ $student->mark }}</td>
                <td>
                  <div class="d-flex gap-3">
                    <form class="delete-form" action="{{ route('student.delete', $student->id) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-info">Edit</a>
                  </div>
                </td>
              </tr>
            @endforeach
          @else
            <h4>No Data</h4>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Student Add</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form data-type="add" action="{{ route('student.store') }}" method="POST">
          @csrf
          <div class="form-group mb-3">
            <label for="">Name</label>
            <input name="name" value="{{ old('name') }}" class="form-control" />
          </div>

          <div class="form-group mb-3">
            <label for="">Subject</label>
            <input name="subject" value="{{ old('subject') }}" class="form-control" />
          </div>

          <div class="form-group mb-3">
            <label for="">Mark</label>
            <input type="number" name="mark" value="{{ old('mark') }}" class="form-control" />
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  $(document).on('submit', 'form.delete-form', function(e) {
    if (!confirm("Are you sure?")) {
      e.preventDefault();
    }
  });
</script>
@endpush
