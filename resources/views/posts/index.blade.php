@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Reviews</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                    <h3><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></h3>
                    {{-- <p>{{$post->message}}</p> --}}
                    <small>Posted by <a href="{{route('profile',$post->user->name)}}"> {{$post->user->name}} </a>on {{$post->created_at->format('d/m/Y \a\t H:i')}}</small><br>
                    @auth
                        @if($post->user_id==Auth::user()->id)
                        <a href="{{route('posts.edit',$post->id)}}"> Edit your experience</a>
                    @else
                    <a href="{{route('like',$post->id)}}">Like</a>
                    @endif
                    <br>
                    @endauth
                    {{$post->likes()->count()}} people found this review helpful.
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
