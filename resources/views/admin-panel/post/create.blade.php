@extends('admin-panel.master')
@section('title', 'Post Create')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Post Create Form</div>
          </div>
          <form action="{{ route('posts.index') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
              <div class="form-group mb-3">
                <label for="">Categories</label>
                <select name="category_id" id="category_id" class="form-control @error('category') is-invalid
                @enderror">
                  <option value="">Select Categories</option>
                  @foreach ($categories as $category )
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                  
                </select>
                @error('category')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label for="">Image</label>
                <input type="file" name="image" value="" class="form-control @error('image') is-invalid
                @enderror">
                @error('image')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid
                @enderror" placeholder="Enter post title">
                @error('title')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" class="form-control @error('content') is-invalid
                @enderror" rows="4" placeholder="Message...">{{ old('content') }}</textarea>
                @error('content')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
        
        
          
          
       
      </div>
    </div>
  </div>
@endsection