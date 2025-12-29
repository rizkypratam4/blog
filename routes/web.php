<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


// Authentication routes
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Email verification route
Route::get('/email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->middleware('auth')->name('verification.resend');

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
})->name('home');

Route::get('/about', function () {
    return view('about', ["title" => "About", "name" => "Rizky Pratama"]);
});

Route::get('/posts', function () {
    $posts = Post::filter(request(['search', 'category', 'author']))->latest()->get();
    return view('posts', [
        "title" => "Blog", 
        "posts" => $posts
    ]);
})->name('posts');

Route::get('/posts/{post:slug}', function(Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact",
        "email" => "rizkypratamalvbis@gmail.com",
        "instagram" => "@rizkprtama"
    ]);
});

Route::get('/authors/{user:username}', function(User $user) {
    //$posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    //$posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => 'Articles  in: ' . $category->name, 'posts' => $category->posts]);
});
