<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories
        $electronics = Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices and accessories.',
        ]);

        $documents = Category::create([
            'name' => 'Documents',
            'description' => 'Cards, documents and identification items.',
        ]);

        $accessories = Category::create([
            'name' => 'Accessories',
            'description' => 'Personal accessories and small belongings.',
        ]);

        $clothing = Category::create([
            'name' => 'Clothing',
            'description' => 'Clothes and wearable items.',
        ]);

        $other = Category::create([
            'name' => 'Other',
            'description' => 'Items that do not fit other categories.',
        ]);


        // Create items
        Item::create([
            'name' => 'Black Wallet',
            'description' => 'A black leather wallet found near the library.',
            'type' => 'Found',
            'location' => 'College Library',
            'category_id' => $accessories->id,
        ]);

        Item::create([
            'name' => 'USB Flash Drive',
            'description' => 'A small black USB drive found in the computer lab.',
            'type' => 'Found',
            'location' => 'Computer Lab',
            'category_id' => $electronics->id,
        ]);

        Item::create([
            'name' => 'Student ID Card',
            'description' => 'A student identification card was found near the cafeteria.',
            'type' => 'Found',
            'location' => 'Cafeteria',
            'category_id' => $documents->id,
        ]);

        Item::create([
            'name' => 'Blue Hoodie',
            'description' => 'A blue hoodie was reported missing after class.',
            'type' => 'Lost',
            'location' => 'Block A',
            'category_id' => $clothing->id,
        ]);

        Item::create([
            'name' => 'Wireless Earbuds',
            'description' => 'A pair of wireless earbuds was reported missing.',
            'type' => 'Lost',
            'location' => 'Student Lounge',
            'category_id' => $electronics->id,
        ]);

        Item::create([
            'name' => 'Water Bottle',
            'description' => 'A reusable water bottle was found near the sports ground.',
            'type' => 'Found',
            'location' => 'Sports Ground',
            'category_id' => $other->id,
        ]);
        
    }
}
