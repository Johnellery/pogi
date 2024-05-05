<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => 'Admin',
            // 'description' => 'Admin User',
        ];
    }

    /**
     * Define a state for Staff Role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function service(): self
    {
        return $this->state([
            'name' => 'Service',
        ]);
    }
    public function partial(): self
    {
        return $this->state([
            'name' => 'Partial Denture (Anterior or Posterior only)',
        ]);
    }
    public function upper(): self
    {
        return $this->state([
            'name' => 'Partial Denture (Anterior or Posterior)Upper only',
        ]);
    }
    public function denture(): self
    {
        return $this->state([
            'name' => ' Complete Denture (Upper only)',
        ]);
    }
    public function jacket(): self
    {
        return $this->state([
            'name' => 'Jacket Crowns (Per Unit)',
        ]);
    }
    public function veneer(): self
    {
        return $this->state([
            'name' => 'Veneer',
        ]);
    }
}
