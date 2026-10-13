@extends('admin-panel.master')
@section('title', 'Skill Index')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <div class="card-title">Skills</div>
              <a href="{{ route('skills.create') }}" class="btn btn-sm btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                Add New
              </a>
            </div>
          </div>

          <div class="card-body">
            @if (session('successMsg'))
              <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
                <div>{{ session('successMsg') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <table class="table table-bordered table-hover align-middle">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Percent</th>
                  <th style="width: 120px;">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($skills as $skill)
                  <tr>
                    <td>{{ $skill->id }}</td>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->percent }}%</td>
                    <td>

                      <form action="{{ url('skills/'.$skill->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <a href="{{ url('skills/'.$skill->id.'/edit') }}" class="btn btn-sm btn-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></svg>
                        </a>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete?')">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="card-footer d-flex justify-content-end">
            {{ $skills->links() }}
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection