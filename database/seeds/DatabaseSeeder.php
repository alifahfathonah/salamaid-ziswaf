<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@email.com',
            'password' => bcrypt('123'),
            'level' => '1'
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
