@extends('admin-panel.master')
@section('title', 'Post Index')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <div class="card-title">Posts</div>
              <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">
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
                  <th>No</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th style="width: 120px;">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $index=> $post)
                  <tr>
                    <td>{{ $index + $posts->firstItem() }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                      <img src="{{ asset('storage/post_images/'.$post->image) }}" alt="" style="width: 100px;">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td><textarea readonly rows="3" class="form-control">{{ $post->content }}</textarea></td>
                    <td>
                      
                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="d-flex align-items-center gap-1">
                          @csrf @method('DELETE')
                          <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></svg>
                          </a>
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                          </button>
                          <a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle"><path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"/></svg>
                            
                          </a>
                        </form>
                      
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="card-footer d-flex justify-content-start">
            {{ $posts->links() }}
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection