@extends('admin-panel.master')
@section('title', 'Post Edit')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Post Edit Form</div>
          </div>
          <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PATCH')
          <div class="card-body">
              <div class="form-group mb-3">
                <label for="">Categories</label>
                <select name="category_id" id="" class="form-control">
                  <option value="">Select Categories</option>
                  @foreach ($categories as $category )
                    <option value="{{ $category->id }}"
                      {{ $post->category_id == $category->id ? 'selected' : '' }}
                      >
                      {{ $category->name }}
                    </option>
                  @endforeach
                  
                </select>
                @error('category_id')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label for="">Image</label>
                <input type="file" name="image" value="" class="form-control @error('image') is-invalid
                @enderror mb-2">
                  <img src="{{ asset('storage/post_images/'.$post->image) }}" alt="" style="width: 100px; border: 1px solid gray; padding: 2px;">
                @error('image')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ old('title') ?? $post->title }}" class="form-control @error('title') is-invalid
                @enderror" placeholder="Enter post title">
                @error('title')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Content</label>
                <textarea type="text" name="content" value="" class="form-control @error('content') is-invalid
                @enderror" rows="4" placeholder="Message...">{{ old('content') ?? $post->content }}</textarea>
                @error('content')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          </form>
        </div>
               
       
      </div>
    </div>
  </div>
@endsection