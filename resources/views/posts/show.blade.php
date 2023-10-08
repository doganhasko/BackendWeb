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
                    {{$post->likes()->count()}} people found this review helpful.
                    

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
