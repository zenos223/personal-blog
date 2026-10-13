@extends('ui-panel.master')
@section('title','Post-details')

@section('content')
  <img src="{{ asset('storage/post_images/' . $post->image) }}" alt="" width="100%" style="height: 450px; border: 1px solid gray;" class="mt-3">
    <br><br>
    <small> 
        <strong> 
            <i class="fa fa-calendar" aria-hidden="true"></i>
            Posted On:
        </strong>
            {{date('d-M-Y',strtotime($post->created_at))}}
    </small>

    <br>
    <small>
        <strong>
            <i class="fa fa-list"></i> Category:
        </strong>
        {{ $post->category->name }}
    </small>
    <br><br>
    <h5><strong>{{ $post->title }}</strong></h5>
    <p style="text-align: justify;">
        {{$post->content}}
    </p>
    <div>
        <form method="POST">
            @csrf

            <div>
                <span>{{ $likes->count() }} likes</span>&nbsp;&nbsp;
                <span>{{ $dislikes->count() }} dislikes</span>&nbsp;&nbsp;
                <span>{{ $comments->count() }} comments</span>
            </div>

            <button type="submit" formaction="{{ url('posts/likes/'.$post->id) }}" class="btn btn-sm btn-success like
                @if ($likeStatus)
                    @if ($likeStatus->type == 'like')
                    disabled
                    @endif
                @endif
                ">
            <i class="far fa-thumbs-up"></i> Like 
            </button>
            <button type="submit" formaction="{{ url('posts/dislikes/'.$post->id) }}" class="btn btn-sm btn-danger like
                @if ($likeStatus)
                    @if ($likeStatus->type == 'dislike')
                    disabled
                    @endif
                @endif
                ">
                <i class="far fa-thumbs-down"></i> DisLike 
            </button>
            <button type="button" class="btn btn-sm btn-info comment" data-toggle="collapse" data-target="#collapseExample">
                <i class="far fa-comment"></i> Comment 
            </button>
        </form>
    </div>
    <br>
    <div class="comment-form">
        <div class="collapse" id="collapseExample">
            <form action="{{ route('posts.comments',$post->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="text" id="" cols="30" rows="3" required class="@error('text') is-invalid
                    @enderror"></textarea>
                    <br>
                    <button class="btn btn-primary btn-sm">
                        <i class="far fa-paper-plane"></i> Submit
                    </button>
                </div>
            </form>
            <br>
            @foreach ($comments as $comment )
            <div class="comment-show">
                <img src="https://pluspng.com/img-png/user-png-icon-male-user-icon-512.png" alt="" width="30px"> {{$comment->user->name}}
                <div class=" comment-box mt-2">
                    {{$comment->text}}
                </div>
            </div>
            <br>
            @endforeach
            
            
          </div>
    </div>
@endsection