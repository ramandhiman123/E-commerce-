<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('products')->insert([

            [
                'product_title' => 'image1',
                'product_price' => 300,
                'product_description' => 'good',
                'stock_quantity' => 10,
                'sub_category_id' => 1,
                'product_brand' => 'nike',
                'product_image_URLs' => 'dummy1.jpg',
                'created_at' => now(),
                'user_id' => 1,
            ],

        ]);

        DB::table('products')->insert([

            [
                'product_title' => 'image2',
                'product_price' => 200,
                'product_description' => 'Good',
                'stock_quantity' => 6,
                'sub_category_id' => 7,
                'product_brand' => 'new',
                'product_image_URLs' => 'dummy2.jpg',
                'created_at' => now(),
                'user_id' => 2,
            ],

        ]);

    }
}
