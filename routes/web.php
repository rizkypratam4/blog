<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ["title" => "About", "name" => "Rizky Pratama"]);
});

Route::get('/blog', function () {
    return view('blog', [
        "title" => "Blog", 
        "blogs" => [
            [
                "judul" => "Belajar laravel dasar",
                "penulis" => "Rizky Pratama",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                \Earum necessitatibus debitis consectetur nostrum nihil vitae atque asperiores 
                possimus assumenda ipsam! Explicabo pariatur ab blanditiis architecto tempora 
                quibusdam aliquam, adipisci consequuntur. Earum fuga quo ducimus id laudantium 
                ]quibusdam at maxime optio voluptatibus magnam. Quod commodi totam, tempore 
                suscipit eaque magnam natus."
            ],
            [
                "judul" => "Tutorial bahasa inggris",
                "penulis" => "Muhammad Ivan Panteleev",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                \Earum necessitatibus debitis consectetur nostrum nihil vitae atque asperiores 
                possimus assumenda ipsam! Explicabo pariatur ab blanditiis architecto tempora 
                quibusdam aliquam, adipisci consequuntur. Earum fuga quo ducimus id laudantium 
                ]quibusdam at maxime optio voluptatibus magnam. Quod commodi totam, tempore 
                suscipit eaque magnam natus."
            ],
        ]
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact",
        "email" => "rizkypratamalvbis@gmail.com",
        "instagram" => "@rizkprtama"
    ]);
});