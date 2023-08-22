<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['title' => 'Платные']);
        Category::create(['title' => 'Бесплатные']);
        Category::create(['title' => 'Android']);
        Category::create(['title' => 'iOS']);
    }
}
