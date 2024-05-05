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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role_id' => '5',
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
    public function user1(): self
    {
        return $this->state([
            'name' => 'Dr. Anabelle M. Santos',
            'email' => 'anabelle@gmail.com',
            'role_id' => '2',
            'password' => static::$password ??= Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
    public function user2(): self
    {
        return $this->state([
            'name' => 'Dr. Abigayle M. Santos',
            'email' => 'abigayle17@gmail.com',
            'role_id' => '4',
            'password' => static::$password ??= Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
    public function user3(): self
    {
        return $this->state([
            'name' => 'Dr. Danille M. Villanueva',
            'email' => 'villanuead23@gmail.com',
            'role_id' => '4',
            'password' => static::$password ??= Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
    public function user4(): self
    {
        return $this->state([
            'name' => 'Mark Anthony',
            'email' => 'markblanquesa7@gmail.com',
            'role_id' => '5',
            'password' => static::$password ??= Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
