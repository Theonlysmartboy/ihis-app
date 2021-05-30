<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
            $user->name = 'Samuel Jackson';
            $user->email = 'user@test.com';
            $user->password = bcrypt('User1234');
            $user->save();
            $user->roles()->attach(Role::where('name', 'user')->first());

            $admin = new User;
            $admin->name = 'Neo Tester';
            $admin->email = 'admin@test.com';
            $admin->password = bcrypt('Admin1234');
            $admin->save();
            $admin->roles()->attach(Role::where('name', 'admin')->first());

            $super_admin = new User;
            $super_admin->name = 'Tosby';
            $super_admin->email = 'super@test.com';
            $super_admin->password = bcrypt('Master1234');
            $super_admin->save();
            $super_admin->roles()->attach(Role::where('name', 'Super admin')->first());
        }  
    }
