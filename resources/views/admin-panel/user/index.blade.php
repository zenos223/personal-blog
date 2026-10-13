@extends('admin-panel.master')
@section('title','User Index')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">User</div>
          </div>
          <div class="card-body">
            @if (session('successMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div>{{ session('successMsg') }}</div>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
        
                  @foreach ($users as $user )
                    <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td>
                      <form action="/users/{{ $user->id }}/delete" method="POST">
                        @csrf
                        <a href="/users/{{ $user->id }}/edit" class="btn btn-success btn-sm">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></svg>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
          </div>
          <div class="card-footer">
            {{ $users->links() }}
          </div>
        </div>



        
      
      </div>
    </div>
  </div>
@endsection
