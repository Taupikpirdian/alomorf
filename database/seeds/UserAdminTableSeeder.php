<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Group;

class UserAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin Alomorf';
        $user->email = 'alomorff@gmail.com';
        $user->password = bcrypt('gueadminalomorf1');
        $user->role_id = 1;
        $user->save();
        $user->groups()->attach(Group::where('name', 'Admin Master')->first());
    }
}
