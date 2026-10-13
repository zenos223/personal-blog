@extends('admin-panel.master')
@section('title', 'Student Index')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <div class="card-title">Students</div>
            </div>
          </div>

          <div class="card-body">
            @if (session('successMsg'))
              <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
                <div>{{ session('successMsg') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if ($studentCounts->count() < 1)
              <form action="{{ route('student_count.update',$student->id) }}" method="POST">
                @csrf
                <div class="input-group">
                  <input type="number" name="count" class="form-control @error('count') is-invalid @enderror" style="border-radius:4px 0px 0px 4px">
                  <button class="btn btn-primary" style="border-radius: 0px 4px 4px 0px">Create</button>
                </div>
                @error('count')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </form>
            @endif
            
            <br>
            <table class="table table-bordered table-hover align-middle">
              <thead>
                <tr>
                  <th>Count</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($student)
                  <tr>
                    <td>{{$student->count}}</td>
                    
                    <td>
                        <button id="addBtn" class="btn btn-sm btn-success" title="Add">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                          Add More Student
                        </button>
                        <form action="{{ route('student_counts.update',$student->id) }}" method="POST" id="addForm" class="col-md-6" style="display: none;">
                          @csrf @method('PUT')
                          <div class="input-group">
                            <input type="number" name="count" class="form-control @error('count') is-invalid @enderror" style="border-radius:4px 0px 0px 4px" placeholder="Enter Student count" required>
                            <button type="submit" class="btn btn-primary" style="border-radius: 0px 4px 4px 0px">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                              Add
                            </button>
                          </div>
                            @error('count')
                              <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </form>

                    </td>
                  </tr>
                   @endif
               
              </tbody>
            </table>
          </div>

          <div class="card-footer d-flex justify-content-end">
            {{-- {{ $projects->links() }} --}}
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('javascript')
  <script>
    $(document).ready(function(){
      $('#addBtn').click(function(){
        $('#addForm').css('display','block');
        $(this).css('display','none');
      });
    });
  </script>
@endsection