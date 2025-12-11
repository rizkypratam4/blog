<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ["title" => "About", "name" => "Rizky Pratama"]);
});

Route::get('/posts', function () {
    return view('posts', [
        "title" => "Blog", 
        "posts" => [
            [
                "id" => 1,
                "slug" => 'belajar-laravel-dasar',
                "title" => "Belajar laravel dasar",
                "author" => "Rizky Pratama",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Earum necessitatibus debitis consectetur nostrum nihil vitae atque asperiores 
                possimus assumenda ipsam! Explicabo pariatur ab blanditiis architecto tempora 
                quibusdam aliquam, adipisci consequuntur. Earum fuga quo ducimus id laudantium 
                ]quibusdam at maxime optio voluptatibus magnam. Quod commodi totam, tempore 
                suscipit eaque magnam natus."
            ],
            [
                "id" => 2,
                "slug" => "tutorial-bahasa-inggris",
                "title" => "Tutorial bahasa inggris",
                "author" => "Muhammad Ivan Panteleev",
                "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia rerum iure dolore.
                Quas corporis pariatur repellat. Vero quasi voluptates optio recusandae ab reprehenderit. Ullam aut sint in
                hic, eius fuga!"
            ],
        ]
    ]);
});

Route::get('/posts/{slug}', function($slug) {
    $posts = [
            [
                "id" => 1,
                "slug" => 'belajar-laravel-dasar',
                "title" => "Belajar laravel dasar",
                "author" => "Rizky Pratama",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                \Earum necessitatibus debitis consectetur nostrum nihil vitae atque asperiores 
                possimus assumenda ipsam! Explicabo pariatur ab blanditiis architecto tempora 
                quibusdam aliquam, adipisci consequuntur. Earum fuga quo ducimus id laudantium 
                ]quibusdam at maxime optio voluptatibus magnam. Quod commodi totam, tempore 
                suscipit eaque magnam natus."
            ],
            [
                "id" => 2,
                "slug" => "tutorial-bahasa-inggris",
                "title" => "Tutorial bahasa inggris",
                "author" => "Muhammad Ivan Panteleev",
                "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia rerum iure dolore.
                Quas corporis pariatur repellat. Vero quasi voluptates optio recusandae ab reprehenderit. Ullam aut sint in
                hic, eius fuga!"
            ],
        ];
    
        $post = Arr::first($posts, function($post) use ($slug) {
            return $post['slug'] == $slug;
        });

        return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact",
        "email" => "rizkypratamalvbis@gmail.com",
        "instagram" => "@rizkprtama"
    ]);
});

