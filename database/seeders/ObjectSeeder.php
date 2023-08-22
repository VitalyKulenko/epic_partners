<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ObjectDB;

class ObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ObjectDB::create(['title' => 'Приложение 1']);
        ObjectDB::create(['title' => 'Приложение 2']);
        ObjectDB::create(['title' => 'Приложение 3']);
        ObjectDB::create(['title' => 'Приложение 4']);
        ObjectDB::create(['title' => 'Приложение 5']);
    }
}
