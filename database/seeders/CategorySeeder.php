<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();


        Category::create([
            'id' => 1,
            'name' => 'dresses',

          
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'id' => 2,
            'name' => 'shoes',

          
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
