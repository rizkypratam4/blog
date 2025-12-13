<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post 
{
    public static function all() {
        return [
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
        ];
    }

    public static function find($slug): array
    {

        // callback function
        // return Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        // arrow function
        $post = Arr::first(static::all(), fn($post) => $post["slug"] == $slug);

        if (!$post) {
            abort(404);
        }

        return $post;
    }
}

