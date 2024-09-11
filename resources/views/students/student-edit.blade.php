@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form data-type="add" action="{{ route('student.update', $student->id) }}" method="POST">
      @csrf
      @method('PUT')
      
      <div class="form-group mb-3">
        <label for="">Name</label>
        <input name="name" value="{{ old('name', $student->name) }}" class="form-control" />
      </div>

      <div class="form-group mb-3">
        <label for="">Subject</label>
        <input name="subject" value="{{ old('subject', $student->subject) }}" class="form-control" />
      </div>

      <div class="form-group mb-3">
        <label for="">Mark</label>
        <input type="number" name="mark" value="{{ old('mark', $student->mark) }}" class="form-control" />
      </div>

      <div class="modal-footer">
        <a href="{{ route('student.list') }}" class="btn btn-secondary mx-3">Back</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>

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

  $(document).on('submit', 'form.studentForm', function(event) {
    event.preventDefault();

    let storeUrl = `{{ route('student.store') }}`;
    let formData = $(this).serialize();
    
    $.ajax({
      url: storeUrl,
      method: "POST",
      data: formData,
      success: function(data) {
        if (data.status === 200) {
          toastr.success(data.message); // Assuming toastr is used for notifications
        } else {
          toastr.error(data.message);
        }
      },
      error: function(xhr) {
        // Handle errors, e.g., validation errors
        toastr.error('An error occurred. Please try again.');
      }
    });
  });
</script>
@endpush
