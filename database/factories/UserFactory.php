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
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'profile_picture' => $this->faker->imageUrl(), // Nullable
            'username' => $this->faker->unique()->userName, // Unique username
            'first_name' => $this->faker->firstName, // First name
            'last_name' => $this->faker->lastName, // Last name
            'degree' => $this->faker->randomElement(['Dr.', 'Prof.', 'M.Sc.', null]), // Nullable degree
            'email' => $this->faker->unique()->safeEmail, // Unique email
            'password' => Hash::make('password'), // Default password
            'role' => $this->faker->randomElement(['administrator', 'lecturer', 'student']), // Role with specified options
            'score' => $this->faker->numberBetween(0, 100), // Score, can be nullable
            'remember_token' => Str::random(10), // Remember token
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