<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@doe.com',
                'password' => app('hash')->make('supersecret', ['rounds' => 12]),
                'role' => 'admin',
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@doe.com',
                'password' => app('hash')->make('supersecret', ['rounds' => 12]),
                'role' => 'user',
            ],
        ];
        foreach ($users as $user) {
            if (User::firstWhere('email', $user['email']) === null) {
                User::create($user);
            }
        }
    }
}
