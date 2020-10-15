<?php

namespace Database\Seeders;

use App\MyProject\Categories\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => Str::random(10),
            'description' => Str::random(50),
            'quantity' => random_int(0, 100),
            'category_id' => Category::first()->id,
        ]);
    }
}
