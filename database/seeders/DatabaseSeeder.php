<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            ['name' => 'user'],
            ['name' => 'admin']
        ]);

        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => '$2y$10$6JF4Y/ZqvqC8TkPPF7ddaudsOXd9gXjLUausPRFBITkVC9S7g99KG', 'role_id' => 2],
        ]);
    }
}
