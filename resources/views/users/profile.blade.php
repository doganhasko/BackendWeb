@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile of <strong> {{$user->name}}</strong> <br> Birthday= {{$user->birthdate}}  <br> Address= {{$user->address}} <br> My Biography= {{$user->aboutme}} <br>
                    <br>



                    @if ($user->avatar)
                        <img src="/avatars/{{ $user->avatar }}" style="width: 280px; margin-top: 10px;" alt="User Avatar">
                    @else
                        <!-- Display a default avatar or a placeholder image if the user doesn't have an avatar -->
                        <img src="/avatars/noavatar.png" style="width: 80px; margin-top: 10px;" alt="Default Avatar">
                    @endif                    

                    @auth
                    @if($user->name==Auth::user()->name || Auth::user()->is_admin==1) 
                        <a href="{{ route('users.edit', ['name' => $user->name]) }}" class="btn btn-primary">Edit Profile</a>
                    @endif
                    <br>
                    @endauth
                </div>
                
                <h2>Shared Experiences:</h2>
                @foreach($user->posts as $post)
                <a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a><br>


                @endforeach
                <hr>
                <h2>Liked Reviews:</h2>
                @foreach($user->likes as $like)
                <a href="{{route('posts.show',$like->post_id)}}">{{$like->post->title}}</a><br>


                @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@include('partials.footer-products')
