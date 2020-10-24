<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(TaskTableSeeder::class);

        //create admin details
                DB::table('users')->insert([
                    'name' => 'admin',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('secret'),
                ]);
                

    }
}
