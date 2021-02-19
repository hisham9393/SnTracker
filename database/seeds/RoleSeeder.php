<?php

use Bitfumes\Multiauth\Model\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name' => 'Sales Man',
        ]);
        Role::create([
            'name' => 'Branch Incharge',
        ]);
        Role::create([
            'name' => 'Accounts',
        ]);
    }
}
