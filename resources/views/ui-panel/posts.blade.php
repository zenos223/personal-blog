@extends('ui-panel.master')
@section('title','Posts')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($posts as $post )
                        <div class="post">
                            <img src="{{ asset('storage/post_images/'.$post->image) }}" alt="" width="100%" style="border: 1px solid gray; height: 400px;">
                            <br><br>
                                <h5><strong>{{$post->title}}</strong></h5>
                            <br>
                            <p>
                                {{ substr($post->content,0,200) }}
                            </p>
                            <a href="{{ route('posts.details',$post->id) }}">
                                <button class="btn btn-info">See More <i class="fas fa-angle-double-right"></i> </button>
                            </a>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                
                </div>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="siderbar">
                <form action="{{ url('search_posts') }}" method="GET">
                    @csrf
                        <div class="input-group">
                            <input type="text" name="search_data" class="form-control" placeholder="Search">
                            <button type="submit" class="btn btn-success">
                                Submit <i class="fa fa-search"></i>
                            </button>
                        </div>
                </form>
                <hr>
                <h5>Categories</h5>
                <ul>
                    @foreach ($categories as $category )
                        <li> <a href="{{ url('search_posts_by_category/'.$category->id) }}">{{ $category->name }}</a> </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
@endsection