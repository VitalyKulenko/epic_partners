<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ObjectDB;
use App\Models\Category;

class ObjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $object1 = ObjectDB::find(1);
        $object1->categories()->attach([1, 3]);

        $object2 = ObjectDB::find(2);
        $object2->categories()->attach([2, 3]);

        $object3 = ObjectDB::find(3);
        $object3->categories()->attach([1, 4]);

        $object4 = ObjectDB::find(4);
        $object4->categories()->attach([2, 4]);

        $object5 = ObjectDB::find(5);
        $object5->categories()->attach([1, 3, 4]);
    }
}
