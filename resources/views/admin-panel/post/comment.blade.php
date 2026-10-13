@extends('admin-panel.master')
@section('title', 'Comment Index')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <div class="card-title">Comments</div>
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
                  
                </tr>
              </thead>
              <tbody>
                @if($comments->count() <1)
                No Comment
                @else
                @foreach ($comments as $index=> $comment)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $comment->text }}</td>
                    
                    <td>
                      
                        <form action="{{ route('comment.show_hide',$comment->id) }}" method="POST" class="d-flex align-items-center gap-1">
                          @csrf 
                          
                          <button type="submit" class="btn btn-sm {{$comment->status == 'show' ? 'btn-danger' : 'btn-success'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-off"><path d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49"/><path d="M14.084 14.158a3 3 0 0 1-4.242-4.242"/><path d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143"/><path d="m2 2 20 20"/></svg>
                            {{ $comment->status == 'show' ? 'Hide' : 'Show' }}
                          </button>
                          
                          
                        </form>
                      
                    </td>
                  </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>

          <div class="card-footer d-flex justify-content-end">
            {{-- {{ $categories->links() }} --}}
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection