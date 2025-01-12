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
        $degree = fake()->randomElement(
            [
                'S. Tr Kom, ',
                'A.Md.Kom'
            ]
        );

        return [
            'profile_picture' => null,  // Menambahkan foto profil yang dapat null
            'username' => fake()->unique()->userName(),  // Username yang unik
            'first_name' => fake()->firstName(),  // Nama depan mahasiswa
            'last_name' => fake()->lastName(),  // Nama belakang mahasiswa
            'degree' => $degree,  // Gelar kosong, hanya dosen yang memiliki gelar
            'email' => fake()->unique()->safeEmail(),  // Email yang unik
            'password' => static::$password ??= Hash::make('password'),  // Password default
            'role' => 'dosen',  // Role mahasiswa
            'score' => fake()->numberBetween(0, 100),  // Skor mahasiswa
            'remember_token' => Str::random(10),  // Token untuk "remember me"
            'created_at' => now(),
            'updated_at' => now(),
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
