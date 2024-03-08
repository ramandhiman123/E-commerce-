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
    }
}