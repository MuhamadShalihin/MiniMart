<?php

use Carbon\Carbon;
use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['cat_name' => 'Drinks', 'slug' => 'drinks', 'created_at' => $now, 'updated_at' =>$now],
            ['cat_name' => 'Milkpowders', 'slug' => 'milkpowder', 'created_at' => $now, 'updated_at' =>$now],
            ['cat_name' => 'Vegetables', 'slug' => 'vegetable', 'created_at' => $now, 'updated_at' =>$now],
            ['cat_name' => 'Frozen Foods', 'slug' => 'frozen', 'created_at' => $now, 'updated_at' =>$now],
        ]);
    }
}
