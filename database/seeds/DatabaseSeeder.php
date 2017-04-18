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
        \App\User::create([
            'name' => 'Testuser',
            'email' => 'test@test.com',
            'password' => bcrypt('test123')
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
