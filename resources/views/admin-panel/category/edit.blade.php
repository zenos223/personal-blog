@extends('admin-panel.master')
@section('title', 'Category Update')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Category Update Form</div>
          </div>
          <form action="{{ route('categories.update',$category->id) }}" method="POST">
            @csrf @method('PATCH')
          <div class="card-body">
              <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control @error('name') is-invalid
                @enderror">
                @error('name')
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