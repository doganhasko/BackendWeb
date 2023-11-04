<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile ($name){
        $user= User::where('name','=',$name)->firstOrFail();
        return view ('users.profile',compact('user'));
    }







    public function edit($name)
    {
        $user = User::where('name', $name)->firstOrFail();
        return view('users.edit', compact('user'));
    }
    

    public function update($name, Request $request)
    {
        $user = User::where('name', $name)->firstOrFail();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'nullable','date',
            'aboutme' => 'nullable','string|max:255', 
            'address' => 'nullable','string|max:255', 
            'avatar' => 'nullable','image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $data = [
            'name' => $request->input('name'),
            'birthdate' => $request->input('birthdate'),
            'aboutme' => $request->input('aboutme'),
            'address' => $request->input('address'),
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 

        ];
    
        // Check if the avatar file was provided
        if ($request->hasFile('avatar')) {
            $avatar = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatar);
    
            // Delete old avatar if it exists
            if ($user->avatar && file_exists(public_path('avatars/'.$user->avatar))) {
                unlink(public_path('avatars/'.$user->avatar));
            }
    
            $data['avatar'] = $avatar;
        }
    
        $user->update($data);
    
        return redirect()->route('index')->with('success', 'Profile updated successfully.');
    }
    
    
    
    
    



}
