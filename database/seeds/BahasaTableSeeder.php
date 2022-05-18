<?php

use Illuminate\Database\Seeder;
use App\Language;

class BahasaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languange = new Language();
        $languange->name = 'Indonesia';
        $languange->short_name = 'IDN';
        $languange->save();
    }
}
