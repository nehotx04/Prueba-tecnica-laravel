<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name' => 'Admin']);
       $role2 = Role::create(['name' => 'Publicador']);
       $role3 = Role::create(['name' => 'Visitante']);

       Permission::create(['name'=>'posts.store'])->assignRole($role2);
       Permission::create(['name'=>'posts.update'])->assignRole($role2);
       Permission::create(['name'=>'posts.destroy'])->assignRole($role2);

       Permission::create(['name'=>'users.destroy'])->assignRole($role1);
    }
}
