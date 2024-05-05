<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class ServiceFactory extends Factory
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
    public function one(): self
    {
        return $this->state([
            'picture' => '',
            'description' => '',
            'name' => 'Dental Check Up',
            'price' => '300',
            'regular' => '',
            'vertex' => '',
            'flexible' => '',
            'category_id' => '1',
            'role_id' => ["2","4"],
        ]);
    }
    public function two(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Oral Prophylaxis (Light/Moderate)',
        'price' => '800',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2"],
    ]);
}

public function three(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Oral Prophylaxis (Heavy)',
        'price' => '1200',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2"],
    ]);
}

public function four(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Oral Prophylaxis with Fluoride Treatment',
        'price' => '1500',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}
public function five(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Dental Sealant per tooth',
        'price' => '500',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}

public function six(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Permanent Filling (Composite or GI)',
        'price' => '800',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}

public function seven(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Diastema Closure per tooth',
        'price' => '1500',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}

public function eight(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Build-up per tooth',
        'price' => '2000',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}
public function nine(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Extraction',
        'price' => '800',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2"],
    ]);
}

public function ten(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Surgery (Impaction)',
        'price' => '8000',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2"],
    ]);
}

public function eleven(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Teeth whitening (Take home)',
        'price' => '12000',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}

public function twelve(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Teeth whitening (One hour chair-side)',
        'price' => '30000',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}

public function thirteen(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Root Canal Treatment (per canal)',
        'price' => '7000',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}

public function fourteen(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Upper and Lower braces',
        'price' => '45000',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}

public function fifteen(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Retainer (upper only)',
        'price' => '3500',
        'regular' => '',
        'vertex' => '',
        'flexible' => '',
        'category_id' => '1',
        'role_id' => ["2","4"],
    ]);
}

public function sixteen(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Japan Plastic (New Ace)',
        'price' => '',
        'regular' => '5000',
        'vertex' => '7000',
        'flexible' => '',
        'category_id' => '2',
        'role_id' => ["2"],
    ]);
}

public function seventeen(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'US Plastic (Natural tone)',
        'price' => '',
        'regular' => '7000',
        'vertex' => '8000',
        'flexible' => '',
        'category_id' => '2',
        'role_id' => ["2"],
    ]);
}

public function eighteen(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'German Plastic (Biotone)',
        'price' => '',
        'regular' => '7000',
        'vertex' => '9000',
        'flexible' => '',
        'category_id' => '2',
        'role_id' => ["2","4"],
    ]);
}

public function nineteen(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Porcelain Us (Natura Dent)',
        'price' => '',
        'regular' => '8000',
        'vertex' => '10000',
        'flexible' => '',
        'category_id' => '3',
        'role_id' => ["2","4"],
    ]);
}

public function twenty(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Porcelain German (Bioform)',
        'price' => '',
        'regular' => '9000',
        'vertex' => '11000',
        'flexible' => '',
        'category_id' => '3',
        'role_id' => ["2","4"],
    ]);
}

public function twentyOne(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Japan Plastic (New Ace)',
        'price' => '',
        'regular' => '6000',
        'vertex' => '8000',
        'flexible' => '',
        'category_id' => '4',
        'role_id' => ["2"],
    ]);
}

public function twentyTwo(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'US Plastic (Natural tone)',
        'price' => '',
        'regular' => '8000',
        'vertex' => '10000',
        'flexible' => '',
        'category_id' => '4',
        'role_id' => ["2"],
    ]);
}

public function twentyThree(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'German Plastic (Biotone)',
        'price' => '',
        'regular' => '9000',
        'vertex' => '11000',
        'flexible' => '',
        'category_id' => '4',
        'role_id' => ["2"],
    ]);
}
public function twentyFour(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Porcelain Us (Natura Dent)',
        'price' => '',
        'regular' => '10000',
        'vertex' => '12000',
        'flexible' => '',
        'category_id' => '4',
        'role_id' => ["2","4"],
    ]);
}

public function twentyFive(): self
{
    return $this->state([
        'picture' => '',
        'description' => '',
        'name' => 'Porcelain German (Bioform)',
        'price' => '',
        'regular' => '12000',
        'vertex' => '14000',
        'flexible' => '',
        'category_id' => '5',
        'role_id' => ["2","4"],
    ]);
}
}
