<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Post Routes
Route::get('/', [PostController::class, 'index'])->name('index');
Route::resource('posts', PostController::class);

// Likes Routes
Route::get('like/{postid}', [LikeController::class, 'like'])->name('like');
Route::get('user/{name}', [UserController::class, 'profile'])->name('profile');

// Page Routes
Route::post('/register', [RegisterController::class, 'create'])->name('register.create');
Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
});
Route::get('/products', function () {
    return view('products');
});
Route::get('/store', function () {
    return view('store');
});
Route::get('/faq', function () {
    return view('faq');
});

// FAQ Routes
Route::get('/faq', 'FaqController@index');
Route::get('faq', [FaqController::class, 'index'])->name('faq.index');

// ContactForm Routes
Route::get('/contact', [ContactController::class,'showContactForm'])->name('contact.show');
Route::post('/contact', [ContactController::class,'storeContactForm'])->name('contact.store');


// Profile Editing Routes
Route::get('user/{name}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('user/{name}/update', [UserController::class, 'update'])->name('users.update');

// Comments Routes
Route::post('/posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store');


Auth::routes();