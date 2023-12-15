<!-- resources/views/admin/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User Management</h2>

        <form method="post" action="{{ route('editadmins.saveChanges') }}">
            @csrf

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Is Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <input type="hidden" name="users[{{ $user->id }}]" value="0"> <!-- Hidden input for is_admin = 0 -->
                                <input type="checkbox" name="users[{{ $user->id }}]" value="1" {{ $user->is_admin ? 'checked' : '' }}>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection

@include('partials.footer-products')