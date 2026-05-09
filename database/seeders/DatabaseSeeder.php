<?php

namespace Database\Seeders;

use App\Models\Breed;
use App\Models\Cage;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Workshop::updateOrCreate(
            ['code' => 'C1'],
            ['name' => 'Цех 1']
        );
        Workshop::updateOrCreate(
            ['code' => 'C2'],
            ['name' => 'Цех 2']
        );
        Workshop::updateOrCreate(
            ['code' => 'C3'],
            ['name' => 'Цех 3']
        );

        Breed::updateOrCreate(
            ['name' => 'Леггорн'],
            ['average_monthly_eggs' => 280, 'average_weight' => 2.4, 'diet_number' => 1, 'description' => 'Легкая яйценоская порода.']
        );
        Breed::updateOrCreate(
            ['name' => 'Коушинская'],
            ['average_monthly_eggs' => 220, 'average_weight' => 2.8, 'diet_number' => 2, 'description' => 'Мясо-яичная порода с хорошей выносливостью.']
        );
        Breed::updateOrCreate(
            ['name' => 'Австралорп'],
            ['average_monthly_eggs' => 250, 'average_weight' => 3.1, 'diet_number' => 3, 'description' => 'Порода с высоким весом и стабильной продуктивностью.']
        );

        Cage::updateOrCreate(
            ['workshop_id' => 1, 'row' => 1, 'number' => 1],
            ['created_at' => now(), 'updated_at' => now()]
        );
        Cage::updateOrCreate(
            ['workshop_id' => 1, 'row' => 1, 'number' => 2],
            ['created_at' => now(), 'updated_at' => now()]
        );
        Cage::updateOrCreate(
            ['workshop_id' => 2, 'row' => 2, 'number' => 1],
            ['created_at' => now(), 'updated_at' => now()]
        );

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'role' => 'admin',
                'password' => bcrypt('password'),
                'salary' => 0,
            ]
        );
    }
}
