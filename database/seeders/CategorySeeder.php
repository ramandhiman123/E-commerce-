<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parent_categories')->insert([
            'category_name' => 'Fashion-Wears',
        ]);
        DB::table('parent_categories')->insert([
            'category_name' => 'Electronics',
        ]);
        DB::table('parent_categories')->insert([
            'category_name' => 'jewellery',
        ]);
        DB::table('parent_categories')->insert([
            'category_name' => 'Kids',
        ]);
        DB::table("sub_categories")->insert([
            'parent_category_id' => 1,
            'sub_category_type' => 'Mens cloth',
        ]);
        DB::table("sub_categories")->insert([
            'parent_category_id' => 1,
            'sub_category_type' => 'Women cloth',
        ]);
        DB::table("sub_categories")->insert([
            'parent_category_id' => 2,
            'sub_category_type' => 'kitchen appliances',
        ]);
        DB::table("sub_categories")->insert([
            'parent_category_id' => 2,
            'sub_category_type' => 'Displays',
        ]);
        DB::table("sub_categories")->insert([
            'parent_category_id' => 3,
            'sub_category_type' => 'Rings',
        ]);
        DB::table("sub_categories")->insert([
            'parent_category_id' => 3,
            'sub_category_type' => 'Bracelets',
        ]);
        DB::table("sub_categories")->insert([
            'parent_category_id' => 4,
            'sub_category_type' => 'toys',
        ]);
        DB::table("sub_categories")->insert([
            'parent_category_id' => 4,
            'sub_category_type' => 'Kids cloth',
       ]);
    }
}
