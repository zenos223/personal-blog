@extends('ui-panel.master')
@section('title', 'Ui Index')


@section('content')
  <!-- ABOUT ME & SKILLS SECTION-->  
  <div class="aboutme">
    <div class="row">
      <div class="col-md-5">
        <br>
        <h3 class="text-center">ABOUT ME</h3>
        <br>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat fugiat soluta consectetur reprehenderit facere, quis error quidem harum quam laborum inventore quasi minima ipsum asperiores laboriosam ipsa enim dolor perferendis.
        </p>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat fugiat soluta consectetur reprehenderit facere, quis error quidem harum quam laborum inventore quasi minima ipsum asperiores laboriosam ipsa enim dolor perferendis.
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="total-project mb-2">
              <i class="fa fa-project-diagram"></i>
              <br>
              <strong>{{ $projects->count() }}</strong>
              <p class="text-center">Total Projects</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="total-student">
              <i class="fas fa-users"></i>
              <br>
                <strong>
                   @if ($studentCount)
                  {{$studentCount->count}}
                  @endif
                </strong>
              
              <p class="text-center">Total Students</p>
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-7">
        <br>
        <h4 class="text-center">MY SKILLS</h4>
        <br>

        @foreach ($skills as $skill)
        <div class="row mb-2 align-items-center">
          <div class="col-md-9">
              <div class="progress mt-2" style=" border: 1px solid gray;">
                <div class="progress-bar" style="width: {{$skill->percent}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  {{ $skill->percent }}%
                </div>
              </div>
          </div>
          <div class="col-md-3">
              {{ $skill->name }}
          </div>                            
        </div>
        @endforeach
        <br>
        {{ $skills->links() }}

      </div>
    </div>
  </div>

  <br><br><br>

  <!-- MY PROJECTS SECTION -->
  <h2 class="text-center">MY PROJECTS</h2><br>
  <div class="row">
    @foreach ($projects as $project)
      <div class="col-sm-6 col-md-4 mb-2">
        <a href="{{ $project->url }}" target="_blank">
          <div class="project-image-div">
            <!-- Use asset() to build proper public path -->
            <img src="{{ asset('images/ruru.jpg') }}" class="project-img" alt="{{ $project->name }}">
            <div class="overlay">
              <div class="text">{{ $project->name }}</div>
            </div>
          </div>
        </a>
      </div>
    @endforeach
      
      
  </div>

  <br><br><br>
  <!-- LATEST POSTS SECTION  -->
  <h2 class="text-center">LATEST POSTS FROM BLOGS</h2><br>
  <p class="text-center">
    Hey Guys! I warmly welcome you to read some of my blog posts. Here are very interesting and exciting posts you can read that i am supporting for you guys!
  </p>
  <div class="row">
    @foreach ($posts as $post)
    <div class="col-sm-6 col-md-4">
        <a href="{{route('posts.details',$post->id)}}">
            <div class="latest-post">
              <img src="{{asset('storage/post_images/'.$post->image)}}" alt="" class="cover self-center">
              <small>{{ date('d-M-Y',strtotime($post->created_at) )}}</small>
              <p><strong>{{ $post->title }}</strong></p>
              <P>
                {{ substr($post->content,0,200) }}
              </P>
            </div>
        </a>
    </div>
    @endforeach
  </div>
@endsection