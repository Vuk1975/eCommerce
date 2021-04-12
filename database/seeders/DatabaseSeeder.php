<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run() {
    // $this->call(UsersTableSeeder::class);
    Category::create(['name'=>'laptop','slug'=>'laptop','description'=>'laptop category','image'=>'files\photo1.jpeg']);
    Category::create(['name'=>'mobile phone','slug'=>'mobile-phone','description'=>'mobile phone category','image'=>'files\0k3i30tSIHJbl9XKbLCQKQ4f2BO1NzXMImqTzvpU.jpg']);
    Category::create(['name'=>'books','slug'=>'books','description'=>'bookx category','image'=>'files\0k3i30tSIHJbl9XKbLCQKQ4f2BO1NzXMImqTzvpU.jpg']);

    Subcategory::create(['name'=>'hp','category_id'=>1]);
    Subcategory::create(['name'=>'Samsung','category_id'=>2]);
    Subcategory::create(['name'=>'lenovo','category_id'=>3]);


    Product::create([
        'name'=>'HP LAPTOPS ',
        'image'=>'files\7ze8dU6EHoncOamplt67pLc8RpUmezeuZP6bVZgs.jpg',
        'price'=> rand(700,1000),
        'description'=>'This is the description of a product',
        'additional_info'=>'This is additional info',
        'category_id'=> 1,
        'subcategory_id'=>1



    ]);

    Product::create([
        'name'=>'Samsung ',
        'image'=>'product\c8aOBpjMEvOFHpXxjpPVs6rzIbYrMxvPNDWPgTuV.jpg',
        'price'=> rand(800,1000),
        'description'=>'This is the description of a product',
        'additional_info'=>'This is additional info',
        'category_id'=> 2,
        'subcategory_id'=>2




    ]);

    Product::create([
        'name'=>'LENOVO BOOK ',
        'image'=>'product\c8aOBpjMEvOFHpXxjpPVs6rzIbYrMxvPNDWPgTuV.jpg',
        'price'=> rand(700,1000),
        'description'=>'This is the description of a product',
        'additional_info'=>'This is additional info',
        'category_id'=> 3,
        'subcategory_id'=>3



    ]);
    User::create([
        'name'=>'LaraAdmin',
        'email'=>'admin@gmail.com',
        'password'=>bcrypt('password'),
        'email_verified_at'=>NOW(),
        'is_admin'=>1
    ]);
    }
}

