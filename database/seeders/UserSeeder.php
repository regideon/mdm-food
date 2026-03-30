<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'  => 'Jane Smith',
            'email' => 'jane@example.com',
        ]);

        User::factory()->create([
            'name'  => 'Mike Johnson',
            'email' => 'mike@example.com',
        ]);

        User::factory()->create([
            'name'  => 'Sarah Wilson',
            'email' => 'sarah@example.com',
        ]);

        User::factory()->create([
            'name'  => 'David Lee',
            'email' => 'david@example.com',
        ]);

        User::factory()->create([
            'name'  => 'Emily Brown',
            'email' => 'emily@example.com',
        ]);

        User::factory()->create([
            'name'  => 'Robert Taylor',
            'email' => 'robert@example.com',
        ]);
    }
}
