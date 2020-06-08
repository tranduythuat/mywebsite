<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Category 1', 
            'parent_id' => 0, 
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Category 2', 
            'parent_id' => 0, 
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Category 3', 
            'parent_id' => 0, 
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Category 1.1', 
            'parent_id' => 1, 
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'Category 1.2', 
            'parent_id' => 1, 
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'name' => 'Category 1.3', 
            'parent_id' => 1, 
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'name' => 'Category 1.1.1', 
            'parent_id' => 4, 
        ]);
        DB::table('categories')->insert([
            'id' => 8,
            'name' => 'Category 2.1', 
            'parent_id' => 2, 
        ]);
        DB::table('categories')->insert([
            'id' => 9,
            'name' => 'Category 3.1', 
            'parent_id' => 3, 
        ]);
    }
}
