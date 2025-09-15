<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Membuat 10 data dummy produk menggunakan factory
        Product::factory()->count(10)->create();
    }
}