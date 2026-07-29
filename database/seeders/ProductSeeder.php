<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Insert categories first
        $categories = ['Soup', 'Seafood', 'Meat', 'Vegetable', 'Meatball', 'Drink'];
        foreach ($categories as $cat) {
            DB::table('categories')->insertOrIgnore(['name' => $cat, 'created_at' => now(), 'updated_at' => now()]);
        }

        $catIds = DB::table('categories')->pluck('id', 'name');

        $products = [
            // Soup
            ['category_id' => $catIds['Soup'], 'name' => 'Tom Yum Soup',    'price' => 5.00, 'image' => 'image/tom-yum.jpg'],
            ['category_id' => $catIds['Soup'], 'name' => 'Mala Soup',       'price' => 6.00, 'image' => 'image/mala.jpg'],
            ['category_id' => $catIds['Soup'], 'name' => 'Chicken Soup',    'price' => 4.00, 'image' => 'image/chicken-soup.jpg'],
            ['category_id' => $catIds['Soup'], 'name' => 'Beef Bone Soup',  'price' => 6.00, 'image' => 'image/beef-bone.jpg'],
            ['category_id' => $catIds['Soup'], 'name' => 'Seafood Soup',    'price' => 7.00, 'image' => 'image/seafood-soup.jpg'],
            ['category_id' => $catIds['Soup'], 'name' => 'Vegetable Soup',  'price' => 4.00, 'image' => 'image/vegetable-soup.jpg'],
            // Seafood
            ['category_id' => $catIds['Seafood'], 'name' => 'Crab',   'price' => 8.00, 'image' => 'image/crab.jpg'],
            ['category_id' => $catIds['Seafood'], 'name' => 'Shrimp', 'price' => 7.00, 'image' => 'image/shrimp.jpg'],
            ['category_id' => $catIds['Seafood'], 'name' => 'Squid',  'price' => 6.00, 'image' => 'image/squid.jpg'],
            ['category_id' => $catIds['Seafood'], 'name' => 'Fish',   'price' => 5.00, 'image' => 'image/fish.jpg'],
            // Meat
            ['category_id' => $catIds['Meat'], 'name' => 'Beef Slice', 'price' => 6.00, 'image' => 'image/beef-slice.jpg'],
            ['category_id' => $catIds['Meat'], 'name' => 'Pork Slice', 'price' => 5.00, 'image' => 'image/pork-slice.jpg'],
            ['category_id' => $catIds['Meat'], 'name' => 'Chicken',    'price' => 4.00, 'image' => 'image/chicken.jpg'],
            // Vegetable
            ['category_id' => $catIds['Vegetable'], 'name' => 'Cabbage',  'price' => 2.00, 'image' => 'image/cabbage.jpg'],
            ['category_id' => $catIds['Vegetable'], 'name' => 'Mushroom', 'price' => 3.00, 'image' => 'image/mushroom.jpg'],
            ['category_id' => $catIds['Vegetable'], 'name' => 'Spinach',  'price' => 2.00, 'image' => 'image/spinach.jpg'],
            // Meatball
            ['category_id' => $catIds['Meatball'], 'name' => 'Fish Ball', 'price' => 3.00, 'image' => 'image/fish-ball.jpg'],
            ['category_id' => $catIds['Meatball'], 'name' => 'Beef Ball', 'price' => 3.00, 'image' => 'image/beef-ball.jpg'],
            // Drink
            ['category_id' => $catIds['Drink'], 'name' => 'Coca Cola', 'price' => 1.50, 'image' => 'image/coca-cola.jpg'],
            ['category_id' => $catIds['Drink'], 'name' => 'Pepsi',     'price' => 1.50, 'image' => 'image/pepsi.jpg'],
            ['category_id' => $catIds['Drink'], 'name' => 'Water',     'price' => 1.00, 'image' => 'image/water.jpg'],
        ];

        foreach ($products as $product) {
            DB::table('products')->insertOrIgnore(array_merge($product, [
                'status'     => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
