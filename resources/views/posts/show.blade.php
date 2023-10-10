@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$post->title}}</div>

                <div class="card-body">


                    <small>Posted by <a href="{{route('profile',$post->user->name)}}"> {{$post->user->name}} </a>on {{$post->created_at->format('d/m/Y \a\t H:i')}}</small><br>
                    <br>

                    {{$post->message}}
                    <br><br>

                    @auth
                        @if($post->user_id==Auth::user()->id)
                        <a href="{{route('posts.edit',$post->id)}}"> Edit your experience</a>
                    @else
                    <a href="{{route('like',$post->id)}}">Like</a>
                    @endif
                    <br>
                    @endauth
                    {{$post->likes()->count()}} people found this review helpful. <hr>
                    
                    <br><br><br><h4>Comments</h4>
                    @if ($post->comments)

                        <!-- Display comments -->
                        @foreach ($post->comments as $comment)
                        <div class="comment">
                            <strong>{{ $comment->user->name }}</strong>
                            <p>{{ $comment->body }}</p>
                        </div>
                        @endforeach
                    @endif
                    <!-- Add comment form -->
                    @auth
                    <form method="post" action="{{ route('comments.store', $post->id) }}">
                        @csrf
                        
                        <div class="form-group">
                            <textarea name="body" class="form-control" placeholder="Add a comment"></textarea>
                        </div>
                        <div class="form-group"><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endauth
                    <br><br>

                    @auth
                        @if(Auth::user()->is_admin)
                        <br><br>
                            <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE REVIEW" style="background-color: red;", onclick="return confirm('Do You Really Want To Delete This Review?');">
                            </form>
                        @endif
                    @endauth
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
