<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SuperAdmin;
use App\Models\GeneralInformation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // Example user creation
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // // Super Admin account
        // SuperAdmin::create([
        //     'username' => 'superadmin',
        //     'password' => 'superadmin', // Should be hashed by a mutator in the model
        // ]);
            $this->call([
        GeneralInformationSeeder::class,
    ]);

    }
}
