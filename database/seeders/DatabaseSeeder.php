<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
        \App\Models\User::create(
            [
                'name' => 'Mike the Tree Climber',
                'email' => 'mikethetreeclimber@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('tree0420'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => bcrypt('tree0420'),
                'remember_token' => Str::random(10),
            ],
        );

        \App\Models\User::create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => bcrypt('tree0420'),
                'remember_token' => Str::random(10),
            ],
        );
    }
}
