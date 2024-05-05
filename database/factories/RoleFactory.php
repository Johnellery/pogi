<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Admin',
            'description' => 'Admin User',
        ];
    }

    /**
     * Define a state for Staff Role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin(): self
    {
        return $this->state([
            'name' => 'Admin',
            'description' => 'Administrator',
        ]);
    }
    public function doctor(): self
    {
        return $this->state([
            'name' => 'Doctor',
            'description' => 'Doctor User',
        ]);
    }
    public function staff(): self
    {
        return $this->state([
            'name' => 'Staff',
            'description' => 'Staff User',
        ]);
    }
    public function dentist(): self
    {
        return $this->state([
            'name' => 'Dentist',
            'description' => 'Dentist User',
        ]);
    }
    public function patient(): self
    {
        return $this->state([
            'name' => 'Patient',
            'description' => 'Patient User',
        ]);
    }
}
