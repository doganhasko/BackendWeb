<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ContactFormSubmitted;
use Illuminate\Support\Facades\Notification;
use Mail;
use App\Mail\DemoMail;


class ContactController extends Controller
{
    public function showContactForm()
{
    return view('contact');
}


public function storeContactForm(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ]);

    // Send email to administrators
    // You can use Laravel's built-in email functionality here
    // Send email to administrators
    $admins = ['doganhasko@gmail.com']; // Add your administrators' email addresses here
    $data = $request->all();
    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
    ];

    Notification::route('mail', $admins)->notify(new ContactFormSubmitted($data));

    // Redirect back with a success message
    return back()->with('success', 'Your message has been sent!');
}

}
