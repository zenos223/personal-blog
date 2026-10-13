@extends('admin-panel.master')
@section('title', 'Project Create')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Project Create Form</div>
          </div>
          <form action="{{ route('projects.store') }}" method="POST">
          @csrf
          <div class="card-body">
              <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid
                @enderror" placeholder="Enter project name">
                @error('name')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">URL</label>
                <input type="text" name="url" value="{{ old('url')}}" class="form-control @error('url') is-invalid
                @enderror" placeholder="Enter URL">
                @error('url')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </div>
          </form>
        </div>
        
        
          
          
       
      </div>
    </div>
  </div>
@endsection