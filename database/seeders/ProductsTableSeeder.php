<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();

        Product::create([
            'id' => 1,
            'name' => 'Product 1',
            'price' => 50.99,
            'quantity' => 50,
            'description' => 'Product One.',
        
        ]);

        Product::create([
            'id' => 2, 
            'name' => 'Product 2',
            'price' => 28.99,
            'quantity' => 30,
            'description' => 'Product Two.',
        ]);
  $categories = Category::all();

  Product::each(function ($product) use ($categories) {
      $product->categories()->attach($categories->random(1)->pluck('id'));
  });
    }
}
