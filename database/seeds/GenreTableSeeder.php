<?php

use Illuminate\Database\Seeder;
use App\Category;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Romantis';
        $category->save();

        $category = new Category();
        $category->name = 'Komedi';
        $category->save();

        $category = new Category();
        $category->name = 'Horror';
        $category->save();
    }
}
