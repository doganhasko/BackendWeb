@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">Address=</label>
                            <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="aboutme">My Biography=</label>
                            <input type="text" id="aboutme" name="aboutme" value="{{ old('aboutme', $user->aboutme) }}" class="form-control"> <br>
                        </div> 

                        <div class="row mb-3">
                            <div class="row mb-3">
                                <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
                        
                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar">
                                    <img src="/avatars/{{ Auth::user()->avatar }}" style="width:80px;margin-top: 10px;">
                        
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                       

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








