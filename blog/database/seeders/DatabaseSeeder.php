<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Catagory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Catagory::truncate();
        Post::truncate();

        $user =User::factory()->create([
            'name' => 'John'
        ]);

        Post::factory(5)->create([
            'user_id' => $user -> id
        ]);

        // $user = User::factory()->create();

        // $family = Catagory::create([
        //     'name' => 'Family',
        //     'slug' =>'family'
        // ]);

        // $personal = Catagory::create([
        //     'name' => 'Personal',
        //     'slug' =>'personal'
        // ]);

        // $work = Catagory::create([
        //     'name' => 'Work',
        //     'slug' =>'work'
        // ]);

        // Post::create([
        //     'user_id'=> $user->id,
        //     'catagory_id'=> $family->id,
        //     'title' => 'My Family Post',
        //     'slug'=>'my-family-post',
        //     'excerpt'=>'<p>Lorem</p>',
        //     'body'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius incidunt maiores quis maxime obcaecati illo, laudantium tempore eos doloribus, consequatur quam deserunt dolores, sunt enim unde exercitationem ex eaque earum.</p>'
        // ]);

        // Post::create([
        //     'user_id'=> $user-> id,
        //     'catagory_id'=> $work-> id,
        //     'title' => 'My Work Post',
        //     'slug'=>'my-work-post',
        //     'excerpt'=>'<p>Lorem</p>',
        //     'body'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius incidunt maiores quis maxime obcaecati illo, laudantium tempore eos doloribus, consequatur quam deserunt dolores, sunt enim unde exercitationem ex eaque earum.</p>'
        // ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}