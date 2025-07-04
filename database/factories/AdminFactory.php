<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?string $password;

    public function definition(): array
    {
        return [
          'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'mobile' => fake()->PhoneNumber(),
            // 'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('admin'),
            // 'remember_token' => Str::random(10),
        ];
    }
}
