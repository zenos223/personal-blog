@extends('admin-panel.master')
@section('title', 'Skill Create')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Skill Create Form</div>
          </div>
          <form action="/skills" method="POST">
          @csrf
          <div class="card-body">
              <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid
                @enderror" placeholder="Enter skill name">
                @error('name')
                  <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Percent</label>
                <input type="text" name="percent" value="{{ old('percent')}}" class="form-control @error('percent') is-invalid
                @enderror" placeholder="Enter percent">
                @error('percent')
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