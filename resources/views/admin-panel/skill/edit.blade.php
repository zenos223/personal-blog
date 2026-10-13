@extends('admin-panel.master')
@section('title', 'Skill Edit')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Skill Edit Form</div>
          </div>
          <form action="{{ url('skills/'.$skill->id) }}" method="POST">
          @csrf @method('PATCH ')
          <div class="card-body">
              <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $skill->name ?? old('name') }}" class="form-control @error('name') is-invalid
                @enderror" placeholder="Enter skill name">
                @error('name')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Percent</label>
                <input type="text" name="percent" value="{{ $skill->percent ?? old('percent')}}" class="form-control @error('percent') is-invalid
                @enderror" placeholder="Enter percent">
                @error('percent')
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