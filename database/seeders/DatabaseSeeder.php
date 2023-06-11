<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        (new User())->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
            'role' => Role::Admin->value,

            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'phone' => '0771234567',
            'address' => 'No 1, Main Street',
            'city' => 'Colombo',
            'province' => 'Western',
            'postal_code' => '12345',
            'country' => 'LK', // default to LK
        ]);

        (new User())->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
            'role' => Role::User->value,

            'first_name' => 'John',
            'last_name' => 'Dow',
            'phone' => '0777321654',
            'address' => 'No 1, Main Street',
            'city' => 'Colombo',
            'province' => 'Western',
            'postal_code' => '12345',
            'country' => 'LK', // default to LK
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            FeaturedSeeder::class,
            // ProductCategorySeeder::class,
            // OrderSeeder::class,
            // OrderItemSeeder::class,
        ]);
    }
}
