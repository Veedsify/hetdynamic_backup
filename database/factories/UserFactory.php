<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => "Dike Wisdom",
            'email' => "dikewisdom787@gmail.com",
            'email_verified_at' => now(),
            'user_id' => fake()->userName(),
            'password' => static::$password ??= Hash::make('1234567890'),
            'role' => 'admin',
            'avatar' => 'https://images.pexels.com/photos/16563297/pexels-photo-16563297/free-photo-of-hermitage-of-saint-john-in-montserrat.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
            'email_verification_token' => Str::random(60),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
