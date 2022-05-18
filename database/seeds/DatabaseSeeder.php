<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BahasaTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(CategoryNewsFeedTableSeeder::class);
        $this->call(StatusPostingTableSeeder::class);
        $this->call(UserAdminTableSeeder::class);
    }
}
