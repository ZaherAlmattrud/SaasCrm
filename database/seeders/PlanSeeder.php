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
        //

        Plan::create([
            'name' => 'Basic Plan',
            'description' => 'This is a basic plan for starters',
            'price' => 29.99,
            'currency' => 'USD',
            'interval' => 30, // 30 days
            'trial_period_days' => 14, // 14 days trial
        ]);

        Plan::create([
            'name' => 'Pro Plan',
            'description' => 'This is a pro plan with more features',
            'price' => 49.99,
            'currency' => 'USD',
            'interval' => 30, // 30 days
            'trial_period_days' => 14, // No trial for pro plan
        ]);

        Plan::create([
            'name' => 'Advanced Plan',
            'description' => 'This is a advance plan with more features',
            'price' => 79.99,
            'currency' => 'USD',
            'interval' => 30, // 30 days
            'trial_period_days' => 14, // No trial for pro plan
        ]);
    }
}
