<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'Basic',
            'description' => 'Perfect for getting started',
            'email_limit' => 1000,
            'price' => 9.99,
        ]);

        Plan::create([
            'name' => 'Pro',
            'description' => 'For growing businesses',
            'email_limit' => 10000,
            'price' => 29.99,
        ]);

        Plan::create([
            'name' => 'Enterprise',
            'description' => 'Unlimited power for large teams',
            'email_limit' => 100000,
            'price' => 99.99,
        ]);
    }
}
