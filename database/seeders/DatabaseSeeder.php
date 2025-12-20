<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\Clock\now;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        

        // Post::create([
        //     'title' => 'Belajar laravel dasar',
        //     'author_id' => 1,
        //     "category_id" => 1,
        //     "slug" => "belajar-laravel-dasar",
        //     'body' => "Laravel includes the ability to seed your database with data using seed classes. 
        //     All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. 
        //     From this class, you may use the call method to run other seed classes, allowing you to control the seeding order."
        // ]);

        $this->call(CategorySeeder::class, UserSeeder::class);

        Post::factory(100)->recycle([
            Category::all(),
            User::all(),
        ])->create();
    }
}
