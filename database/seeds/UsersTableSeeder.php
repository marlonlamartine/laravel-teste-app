<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Marlon Lamartine',
            'email' => 'marlon@email.com',
            'password' => bcrypt('890'),
        ]);
    }
}
