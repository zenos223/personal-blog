@extends('admin-panel.master')
@section('title', 'Project Edit')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Project Edit Form</div>
          </div>
          <form action="{{ route('projects.update',$project->id) }}" method="POST">
          @csrf @method('PATCH ')
          <div class="card-body">
              <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $project->name ?? old('name') }}" class="form-control @error('name') is-invalid
                @enderror" placeholder="Enter project name">
                @error('name')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">URL</label>
                <input type="text" name="url" value="{{ $project->url ?? old('url')}}" class="form-control @error('url') is-invalid
                @enderror" placeholder="Enter url">
                @error('url')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary mt-3">Update</button>
          </div>
          </form>
        </div>
        
        
          
          
       
      </div>
    </div>
  </div>
@endsection