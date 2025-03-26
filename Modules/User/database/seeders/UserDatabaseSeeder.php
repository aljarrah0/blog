<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Models\User;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'user ' . $i,
                'email' => 'email ' . $i . '@gmail.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
