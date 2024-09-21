<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Password;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        // Seed passwords for individual routes
        Password::create([
            'route_name' => 'database',
            'password' => Hash::make('140721'),
        ]);

        Password::create([
            'route_name' => 'inbox.index',
            'password' => Hash::make('140721'),
        ]);

        Password::create([
            'route_name' => 'administrasi',
            'password' => Hash::make('bazma1992'),
        ]);

        Password::create([
            'route_name' => 'penilaian',
            'password' => Hash::make('bazma1992'),
        ]);

        Password::create([
            'route_name' => 'sarpras',
            'password' => Hash::make('bazma1992'),
        ]);

        Password::create([
            'route_name' => 'finance',
            'password' => Hash::make('bazma1992'),
        ]);

        Password::create([
            'route_name' => 'pkg',
            'password' => Hash::make('190924'),
        ]);

        Password::create([
            'route_name' => 'jamaah.index',
            'password' => Hash::make('170845'),
        ]);

        Password::create([
            'route_name' => 'patroli.asrama.index',
            'password' => Hash::make('170845'),
        ]);
    }
}
