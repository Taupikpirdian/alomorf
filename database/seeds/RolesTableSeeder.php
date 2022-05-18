<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'List Roles';
        $role->save();

        $role = new Role();
        $role->name = 'Create Role';
        $role->save();

        $role = new Role();
        $role->name = 'Details Role';
        $role->save();

        $role = new Role();
        $role->name = 'Edit Role';
        $role->save();

        $role = new Role();
        $role->name = 'Delete Role';
        $role->save();

        $role = new Role();
        $role->name = 'Search Role';
        $role->save();


        $role = new Role();
        $role->name = 'List Groups';
        $role->save();

        $role = new Role();
        $role->name = 'Create Group';
        $role->save();

        $role = new Role();
        $role->name = 'Details Group';
        $role->save();

        $role = new Role();
        $role->name = 'Edit Group';
        $role->save();

        $role = new Role();
        $role->name = 'Delete Group';
        $role->save();

        $role = new Role();
        $role->name = 'Search Group';
        $role->save();


        $role = new Role();
        $role->name = 'List User Groups';
        $role->save();

        $role = new Role();
        $role->name = 'Create User Group';
        $role->save();

        $role = new Role();
        $role->name = 'Details User Group';
        $role->save();

        $role = new Role();
        $role->name = 'Edit User Group';
        $role->save();

        $role = new Role();
        $role->name = 'Delete User Group';
        $role->save();

        $role = new Role();
        $role->name = 'Search User Group';
        $role->save();


        $role = new Role();
        $role->name = 'List Group Roles';
        $role->save();

        $role = new Role();
        $role->name = 'Create Group Role';
        $role->save();

        $role = new Role();
        $role->name = 'Details Group Role';
        $role->save();

        $role = new Role();
        $role->name = 'Edit Group Role';
        $role->save();

        $role = new Role();
        $role->name = 'Delete Group Role';
        $role->save();

        $role = new Role();
        $role->name = 'Search Group Role';
        $role->save();
    }
}

