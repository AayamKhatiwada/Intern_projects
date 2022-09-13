<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Double;
use Ramsey\Uuid\Type\Integer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Product::factory(50)->create();

        $catagory = array(
            'Adidas', 'Nike', 'Reebok', 'Gucci', 'Puma', 'Air Jordan', 'Converse', 'H&M', 'Miu Miu', 'New Balance', 'Burberry', 'Skechers', 'Under Armour', 'Vans', 'Mizuno Corporation', 'Zappos', 'Bata', 'UGG', 'Fila', 'Brooks Sports'
        );

        $image = array(
            'https://image.shutterstock.com/image-photo/groom-wearing-shoes-indoors-male-600w-346799297.jpg',
            'https://image.shutterstock.com/image-photo/pair-boat-shoes-that-on-600w-1161331348.jpg',
            'https://image.shutterstock.com/image-photo/leather-glazed-derby-brogues-shoes-600w-1927966688.jpg',
            'https://image.shutterstock.com/image-photo/italian-glazing-leather-wedding-blake-600w-2066916626.jpg',
            'https://image.shutterstock.com/image-photo/white-sneaker-on-blue-gradient-600w-2118058709.jpg',
            'https://image.shutterstock.com/image-photo/yellow-tennis-modern-shoes-isolated-600w-1115795330.jpg',
            'https://image.shutterstock.com/image-photo/womens-red-shoes-varnish-on-600w-555797056.jpg',
            'https://image.shutterstock.com/image-photo/pavia-italy-november-2-2020-600w-1918622864.jpg',
            'https://image.shutterstock.com/image-photo/sport-shoes-600w-269007500.jpg',
            'https://image.shutterstock.com/image-photo/shoes-isolated-on-white-background-600w-2198515663.jpg',
            'https://image.shutterstock.com/image-photo/demi-season-kids-shoe-on-600w-1138592453.jpg',
            'https://image.shutterstock.com/image-photo/leather-shoes-isolated-on-white-600w-375086413.jpg',
        );

        for ($i = 0; $i < 12; $i++) {
            \App\Models\Product::factory()->create([
                'price' => $i + 10 *2, 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur sunt minus ullam labore quos adipisci reiciendis debitis! Fugit modi quae accusamus voluptate, ipsum laudantium, sint quasi, cum esse non dignissimos?Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur sunt minus ullam labore quos adipisci reiciendis debitis! Fugit modi quae accusamus voluptate, ipsum laudantium, sint quasi, cum esse non dignissimos?', 'catagory' => $catagory[$i], 'img_src' => $image[$i]
            ]);
        }


        User::create(['name' => 'aayam', 'email' => 'firsttroll100@gmail.com', 'password' => bcrypt('123aayam123'),'address' => 'Radhe Radhe, Bhaktapur', 'phoneno' => '9818354005']);
    }
}
