<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Group;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin Master';
        $user->email = 'adminMaster@ftek.uninus.ac.id';
        $user->password = bcrypt('ft3kun1nus');
        $user->role_id = 1;
        $user->save();
        $user->groups()->attach(Group::where('name', 'Admin Master')->first());
    }
}
