<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EdotAdminsController extends Controller
{
    

    public function index()
    {
        $users = User::all();

        return view('editadmins', compact('users'));
    }

    public function saveChanges(Request $request)
    {
        foreach ($request->input('users') as $userId => $isAdmin) {
            $user = User::find($userId);
            if ($user) {
                $user->update(['is_admin' => $isAdmin]);
            }
        }

        return redirect()->route('editadmins')->with('success', 'Changes saved successfully.');
    }
}
