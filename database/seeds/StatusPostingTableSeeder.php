<?php

use Illuminate\Database\Seeder;
use App\PartStoryStatus;

class StatusPostingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new PartStoryStatus();
        $status->id = 1;
        $status->name = 'Published';
        $status->save();

        $status = new PartStoryStatus();
        $status->id = 2;
        $status->name = 'Draf';
        $status->save();
    }
}
