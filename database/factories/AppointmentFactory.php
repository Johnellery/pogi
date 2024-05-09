<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class AppointmentFactory extends Factory
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
    public function appointment1(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Loyd',
            'middle' => '',
            'last' => 'Pwerto',
            'phone' => '09293015584',
            'age' => '23',
            'gender' => 'male',
            'unit' => '130',
            'barangay' => 'inaon',
            'city' => 'pulilan',
            'province' => 'bulacan',
            'doctor_user_id' => '2',
            'service_id' => '12',
            'user_id' => '6',
            'status' => 'cancelled',
            'time' => '13:15:00',
            'fullname' => 'Loyd Pwerto',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment2(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Louie',
            'middle' => '',
            'last' => 'Villaraza',
            'phone' => '09293015584',
            'age' => '20',
            'gender' => 'Male',
            'unit' => '123',
            'barangay' => 'Balucuc',
            'city' => 'Apalit',
            'province' => 'Pampanga',
            'doctor_user_id' => '3',
            'service_id' => '8',
            'user_id' => '7',
            'status' => 'cancelled',
            'time' => '13:30:00',
            'fullname' => 'Loiue Villaraza',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment3(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Jayson',
            'middle' => 'Pore',
            'last' => 'Sebastian',
            'phone' => '09293015584',
            'age' => '19',
            'gender' => 'Male',
            'unit' => '321',
            'barangay' => 'Paltao',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '10',
            'user_id' => '8',
            'status' => 'cancelled',
            'fullname' => 'Jayson Pore Sebastian',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment4(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Franky',
            'middle' => '',
            'last' => 'Villamor',
            'phone' => '09293015584',
            'age' => '26',
            'gender' => 'Male',
            'unit' => '745',
            'barangay' => 'Dampol2nd',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '12',
            'user_id' => '9',
            'status' => 'cancelled',
            'fullname' => 'Franky Villamor',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
     public function appointment5(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Christian',
            'middle' => '',
            'last' => 'Flores',
            'phone' => '09293015584',
            'age' => '26',
            'gender' => 'Male',
            'unit' => '745',
            'barangay' => 'Dampol2nd',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '12',
            'user_id' => '10',
            'status' => 'cancelled',
            'fullname' => 'Christian Flores',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment6(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Trisha',
            'middle' => 'Lou',
            'last' => 'Gonzalez',
            'phone' => '09293015584',
            'age' => '23',
            'gender' => 'Female',
            'unit' => '745',
            'barangay' => 'Dampol1st',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '13',
            'user_id' => '12',
            'status' => 'cancelled',
            'time' => '14:05:00',
            'fullname' => 'Trisha Lou Gonzalez',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment7(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Alwina',
            'middle' => 'Cruz',
            'last' => 'Lopez',
            'phone' => '09293015584',
            'age' => '21',
            'gender' => 'Female',
            'unit' => '103',
            'barangay' => 'Pinagbarilan',
            'city' => 'Baliuag',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '14',
            'user_id' => '11',
            'status' => 'cancelled',
            'time' => '13:45:00',
            'fullname' => 'Alwina Cruz Lopez',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment8(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Jericho',
            'middle' => '',
            'last' => 'Victoria',
            'phone' => '09293015584',
            'age' => '25',
            'gender' => 'Male',
            'unit' => '695',
            'barangay' => 'Malamig',
            'city' => 'Bustos',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '8',
            'user_id' => '13',
            'status' => 'cancelled',
            'time' => '14:05:00',
            'fullname' => 'Jericho Victoria',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment9(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Alma',
            'middle' => '',
            'last' => 'Balbuena',
            'phone' => '09293015584',
            'age' => '29',
            'gender' => 'Female',
            'unit' => '852',
            'barangay' => 'Sta cruz',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '3',
            'user_id' => '14',
            'status' => 'cancelled',
            'time' => '14:25:00',
            'fullname' => 'Alma Baluena',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment10(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Cris',
            'middle' => '',
            'last' => 'Tupaz',
            'phone' => '09293015584',
            'age' => '30',
            'gender' => 'Male',
            'unit' => '963',
            'barangay' => 'Paltao',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '9',
            'user_id' => '16',
            'status' => 'cancelled',
            'time' => '14:45:00',
            'fullname' => 'Cris Tupaz',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment11(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Hogan',
            'middle' => 'Villanueva',
            'last' => 'Castro',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '15',
            'status' => 'cancelled',
            'time' => '15:05:00',
            'fullname' => 'Hogan Villanueva Castro',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment12(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Mark',
            'middle' => '',
            'last' => 'Malone',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Longos',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '9',
            'user_id' => '17',
            'status' => 'cancelled',
            'time' => '15:25:00',
            'fullname' => 'Mark Malone',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment13(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Laurence',
            'middle' => '',
            'last' => 'Lopez',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Longos',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '9',
            'user_id' => '18',
            'status' => 'cancelled',
            'fullname' => 'Laurence Lopez',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment14(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Micheal',
            'middle' => 'Jeffrey',
            'last' => 'Jordan',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '18',
            'status' => 'cancelled',
            'time' => '15:45:00',
            'fullname' => 'Michael Jeffrey Jordan',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment15(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Carl',
            'middle' => '',
            'last' => 'Malone',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '18',
            'status' => 'cancelled',
            'time' => '16:05:00',
            'fullname' => 'Carl Malone',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment16(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Steph',
            'middle' => '',
            'last' => 'Curry',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '9',
            'user_id' => '19',
            'status' => 'cancelled',
            'time' => '16:25:00',
            'fullname' => 'Steph Curry',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment17(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Renzo',
            'middle' => '',
            'last' => 'Bianes',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '9',
            'user_id' => '20',
            'status' => 'cancelled',
            'fullname' => 'Renzo Bianes',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment18(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Mark Joel',
            'middle' => '',
            'last' => 'Baladad',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '21',
            'status' => 'cancelled',
            'time' => '16:45:00',
            'fullname' => 'Mark Joel Baladad',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment19(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Jc',
            'middle' => '',
            'last' => 'Victoria',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '9',
            'user_id' => '22',
            'status' => 'cancelled',
            'time' => '17:05:00',
            'fullname' => 'Jc Victoria',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment20(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Chris',
            'middle' => '',
            'last' => 'Jericho',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '9',
            'user_id' => '23',
            'status' => 'cancelled',
            'time' => '17:25:00',
            'fullname' => 'Hogan Villanueva Castro',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment21(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Mike',
            'middle' => '',
            'last' => 'Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '9',
            'user_id' => '24',
            'status' => 'cancelled',
            'time' => '17:45:00',
            'fullname' => 'Mike Cruz',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment22(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Jane',
            'middle' => 'Villanueva',
            'last' => 'Perez',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '25',
            'status' => 'cancelled',
            'time' => '18:05:00',
            'fullname' => 'Jane Villanueva Perez',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment23(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'RIchard',
            'middle' => '',
            'last' => 'Fuentes',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '9',
            'user_id' => '26',
            'status' => 'cancelled',
            'time' => '09:15:00',
            'fullname' => 'Richard Fuentes',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment24(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Oliver',
            'middle' => '',
            'last' => 'Medalla',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '9',
            'user_id' => '27',
            'status' => 'cancelled',
            'time' => '09:30:00',
            'fullname' => 'Oliver Medalla',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment25(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Diego',
            'middle' => '',
            'last' => 'Fast',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '28',
            'status' => 'cancelled',
            'fullname' => 'Diego Fast',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment26(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Michelle',
            'middle' => 'Cruz',
            'last' => 'Pastrana',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '9',
            'user_id' => '29',
            'status' => 'cancelled',
            'time' => '09:45:00',
            'fullname' => 'Michelle Pastrana',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment27(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Mia',
            'middle' => '',
            'last' => 'Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '9',
            'user_id' => '30',
            'status' => 'cancelled',
            'time' => '10:05:00',
            'fullname' => 'Mia Cruz',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment28(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Jeffrey',
            'middle' => '',
            'last' => 'Navarro',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '31',
            'status' => 'cancelled',
            'time' => '10:25:00',
            'fullname' => 'Jeffrey Navarro',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment29(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Chris',
            'middle' => '',
            'last' => 'Tupaz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '32',
            'status' => 'cancelled',
            'time' => '10:45:00',
            'fullname' => 'Chris Tupaz',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment30(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Ariel',
            'middle' => '',
            'last' => 'Labang',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '9',
            'user_id' => '33',
            'status' => 'cancelled',
            'time' => '11:05:00',
            'fullname' => 'Ariel Labang',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment31(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Denron',
            'middle' => '',
            'last' => 'Dosal',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '34',
            'status' => 'cancelled',
            'time' => '11:30:00',
            'fullname' => 'Denron Dosal',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment32(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Dennis',
            'middle' => '',
            'last' => 'Castro',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '35',
            'status' => 'cancelled',
            'time' => '11:45:00',
            'fullname' => 'Dennis Castro',
            'date' => '2024-05-10 00:00:00',
        ]);
    }
    public function appointment33(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'RapRap',
            'middle' => '',
            'last' => 'Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '36',
            'status' => 'cancelled',
            'fullname' => 'RapRap Cruz',
            'date' => '2024-05-07 00:00:00',
        ]);
    }
    public function appointment34(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Ferdinand',
            'middle' => '',
            'last' => 'Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '37',
            'status' => 'cancelled',
            'fullname' => 'Ferdinand Cruz',
            'date' => '2024-05-07 00:00:00',
        ]);
    }
    public function appointment35(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Jeric',
            'middle' => '',
            'last' => 'Tremutcha',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '38',
            'status' => 'cancelled',
            'fullname' => 'Jeric Tremutcha',
            'date' => '2024-05-7 00:00:00',
        ]);
    }
    public function appointment36(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Erico',
            'middle' => '',
            'last' => 'Tremutcha',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '39',
            'status' => 'cancelled',
            'fullname' => 'Erico Tremutcha',
            'date' => '2024-05-7 00:00:00',
        ]);
    }
    public function appointment37(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Eric',
            'middle' => '',
            'last' => 'Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '40',
            'status' => 'cancelled',
            'fullname' => 'Eric Cruz',
            'date' => '2024-05-7 00:00:00',
        ]);
    }
    public function appointment38(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Renard',
            'middle' => '',
            'last' => 'Sillintes',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '41',
            'status' => 'cancelled',
            'fullname' => 'Renard Sillintes',
            'date' => '2024-05-7 00:00:00',
        ]);
    }
    public function appointment39(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Elaiza',
            'middle' => '',
            'last' => 'Mendoza',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '45',
            'status' => 'cancelled',
            'fullname' => 'Elaiza Mendoza',
            'date' => '2024-05-7 00:00:00',
        ]);
    }
    public function appointment40(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Juan',
            'middle' => '',
            'last' => 'Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '43',
            'status' => 'cancelled',
            'fullname' => 'Juan Cruz',
            'date' => '2024-05-7 00:00:00',
        ]);
    }
    public function appointment41(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Killua',
            'middle' => '',
            'last' => 'Zoldick',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '44',
            'status' => 'cancelled',
            'fullname' => 'Killua Zoldick',
            'date' => '2024-05-7 00:00:00',
        ]);
    }
    public function appointment42(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Alvin',
            'middle' => '',
            'last' => 'Romero',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '9',
            'user_id' => '45',
            'status' => 'cancelled',
            'fullname' => 'Alvin Romero',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment43(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'James',
            'middle' => '',
            'last' => 'Patrick',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '1',
            'user_id' => '46',
            'status' => 'cancelled',
            'fullname' => 'James Patrick',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment44(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Richard',
            'middle' => '',
            'last' => 'Bianes',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '2',
            'user_id' => '47',
            'status' => 'cancelled',
            'fullname' => 'Richard Bianes',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment45(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Sai',
            'middle' => '',
            'last' => 'Ballentos',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '3',
            'user_id' => '48',
            'status' => 'cancelled',
            'fullname' => 'Sai Ballentos',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment46(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Ashley',
            'middle' => '',
            'last' => 'Mendoza',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '4',
            'user_id' => '49',
            'status' => 'cancelled',
            'fullname' => 'Ashley Mendoza',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment47(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Ariel',
            'middle' => '',
            'last' => 'Mae',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '1',
            'service_id' => '5',
            'user_id' => '50',
            'status' => 'cancelled',
            'fullname' => 'Ariel Mae',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment48(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Michaela',
            'middle' => '',
            'last' => 'Rivera',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '1',
            'service_id' => '5',
            'user_id' => '50',
            'status' => 'cancelled',
            'fullname' => 'Ashley Mendoza',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment49(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Patricia',
            'middle' => '',
            'last' => 'Quilao',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '1',
            'user_id' => '51',
            'status' => 'cancelled',
            'fullname' => 'Patricia Quilao',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment50(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Jane',
            'middle' => '',
            'last' => 'Laica',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '2',
            'user_id' => '52',
            'status' => 'cancelled',
            'fullname' => 'Jane Laica',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment51(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Eunice',
            'middle' => '',
            'last' => 'Dimaapi',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '3',
            'user_id' => '53',
            'status' => 'cancelled',
            'fullname' => 'Eunice Dimaapi',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment52(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Richel',
            'middle' => '',
            'last' => 'Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '1',
            'service_id' => '4',
            'user_id' => '54',
            'status' => 'cancelled',
            'fullname' => 'Richel Cruz',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment53(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Jennifer',
            'middle' => '',
            'last' => 'Genda',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '5',
            'user_id' => '55',
            'status' => 'cancelled',
            'fullname' => 'Jennifer Genda',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment54(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Shella',
            'middle' => '',
            'last' => 'Aboganda',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '4',
            'user_id' => '55',
            'status' => 'cancelled',
            'fullname' => 'Shella Aboganda',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment55(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Shiela',
            'middle' => '',
            'last' => 'Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '5',
            'user_id' => '56',
            'status' => 'cancelled',
            'fullname' => 'Shiela Cruz',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment56(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Portia',
            'middle' => '',
            'last' => 'Morales',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '1',
            'service_id' => '1',
            'user_id' => '57',
            'status' => 'cancelled',
            'fullname' => 'Portia Morales',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment57(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Kizzeyah',
            'middle' => '',
            'last' => 'Lexi',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Female',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '2',
            'user_id' => '58',
            'status' => 'cancelled',
            'fullname' => 'Kizzeyah Lexi',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment58(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Manuel',
            'middle' => '',
            'last' => 'Villaraza',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '3',
            'user_id' => '59',
            'status' => 'cancelled',
            'fullname' => 'Manuel Villaraza',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment59(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Alex',
            'middle' => '',
            'last' => 'Manuel',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '4',
            'user_id' => '60',
            'status' => 'cancelled',
            'fullname' => 'Alex Manuel',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment60(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Raymark',
            'middle' => '',
            'last' => 'Victoria',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '5',
            'user_id' => '61',
            'status' => 'cancelled',
            'fullname' => 'Raymark Victoria',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment61(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'John',
            'middle' => '',
            'last' => 'Santos',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '1',
            'user_id' => '62',
            'status' => 'cancelled',
            'fullname' => 'John Santos',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment62(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Albert',
            'middle' => '',
            'last' => 'Santos',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '2',
            'user_id' => '73',
            'status' => 'cancelled',
            'fullname' => 'Albert Santos',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment63(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Angelo',
            'middle' => '',
            'last' => 'Ico',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '2',
            'user_id' => '63',
            'status' => 'cancelled',
            'fullname' => 'Angelo Ico',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment64(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Ardy',
            'middle' => '',
            'last' => 'Dela Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '3',
            'user_id' => '64',
            'status' => 'cancelled',
            'fullname' => 'Ardy Dela Cruz',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment65(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Aldrin',
            'middle' => '',
            'last' => 'Dela Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '4',
            'user_id' => '65',
            'status' => 'cancelled',
            'fullname' => 'Aldrin Dela Cruz',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment66(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Vhan',
            'middle' => '',
            'last' => 'Mariano',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '5',
            'user_id' => '66',
            'status' => 'cancelled',
            'fullname' => 'Vhan Mariano',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment67(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Reyson',
            'middle' => '',
            'last' => 'Malaluan',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '1',
            'user_id' => '67',
            'status' => 'cancelled',
            'fullname' => 'Reyson Malaluan',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment68(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Shong',
            'middle' => '',
            'last' => 'Thirdy',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '2',
            'user_id' => '68',
            'status' => 'cancelled',
            'fullname' => 'Shong Thirdy',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment69(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Kier',
            'middle' => '',
            'last' => 'Masadula',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '4',
            'service_id' => '3',
            'user_id' => '69',
            'status' => 'cancelled',
            'fullname' => 'Kier Masadula',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment70(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Jose',
            'middle' => '',
            'last' => 'Delapena',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '2',
            'service_id' => '1',
            'user_id' => '70',
            'status' => 'cancelled',
            'fullname' => 'Jose Delapena',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
    public function appointment71(): self
    {
        return $this->state([
            'appointment_number' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            'first' => 'Lando',
            'middle' => '',
            'last' => 'Cruz',
            'phone' => '09293015584',
            'age' => '31',
            'gender' => 'Male',
            'unit' => '753',
            'barangay' => 'Plaridel',
            'city' => 'Pulilan',
            'province' => 'Bulacan',
            'doctor_user_id' => '3',
            'service_id' => '2',
            'user_id' => '72',
            'status' => 'cancelled',
            'fullname' => 'Lando Cruz',
            'date' => '2024-05-8 00:00:00',
        ]);
    }
}















// <?php

// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
//  */
// class AppointmentFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         return [
//             // 'name' => 'Admin',
//             // 'description' => 'Admin User',
//         ];
//     }

//     /**
//      * Define a state for Staff Role.
//      *
//      * @return \Illuminate\Database\Eloquent\Factories\Factory
//      */
//     public function appointment1(): self
//     {
//         return $this->state([
//             'first' => 'loyd',
//             'middle' => '',
//             'last' => 'pwerto',
//             'phone' => '09293015584',
//             'age' => '23',
//             'gender' => 'male',
//             'unit' => '130',
//             'barangay' => 'inao',
//             'city' => 'pulilan',
//             'province' => 'bulacan',
//             'doctor_user_id' => '2',
//             'service_id' => ["12"],
//             'user_id' => '6',
//             'date' => '2024-04-21 00:00:00',
//         ]);
//     }
//     public function appointment2(): self
//     {
//         return $this->state([
//             'first' => 'louie',
//             'middle' => '',
//             'last' => 'villaraza',
//             'phone' => '09293015584',
//             'age' => '20',
//             'gender' => 'male',
//             'unit' => '123',
//             'barangay' => 'balucuc',
//             'city' => 'apalit',
//             'province' => 'pampanga',
//             'doctor_user_id' => '3',
//             'service_id' => ["8"],
//             'user_id' => '7',
//             'date' => '2024-04-20 00:00:00',
//         ]);
//     }
//     public function appointment3(): self
//     {
//         return $this->state([
//             'first' => 'jayson',
//             'middle' => 'pore',
//             'last' => 'sebastian',
//             'phone' => '09293015584',
//             'age' => '19',
//             'gender' => 'male',
//             'unit' => '321',
//             'barangay' => 'paltao',
//             'city' => 'pulilan',
//             'province' => 'bulacan',
//             'doctor_user_id' => '4',
//             'service_id' => ["10"],
//             'user_id' => '8',
//             'date' => '2024-04-12 00:00:00',
//         ]);
//     }
//     public function appointment4(): self
//     {
//         return $this->state([
//             'first' => 'franky',
//             'middle' => '',
//             'last' => 'villamor',
//             'phone' => '09293015584',
//             'age' => '26',
//             'gender' => 'male',
//             'unit' => '745',
//             'barangay' => 'dampol2nd',
//             'city' => 'pulilan',
//             'province' => 'bulacan',
//             'doctor_user_id' => '2',
//             'service_id' => ["10"],
//             'user_id' => '9',
//             'date' => '2024-04-25 00:00:00',
//         ]);
//     }
//      public function appointment5(): self
//     {
//         return $this->state([
//             'first' => 'franky',
//             'middle' => '',
//             'last' => 'villamor',
//             'phone' => '09293015584',
//             'age' => '26',
//             'gender' => 'male',
//             'unit' => '745',
//             'barangay' => 'dampol2nd',
//             'city' => 'pulilan',
//             'province' => 'bulacan',
//             'doctor_user_id' => '4',
//             'service_id' => ["12"],
//             'user_id' => '10',
//             'date' => '2024-04-26 00:00:00',
//         ]);
//     }
//     public function appointment6(): self
//     {
//         return $this->state([
//             'first' => 'trisha',
//             'middle' => 'lou',
//             'last' => 'gonzalez',
//             'phone' => '09293015584',
//             'age' => '23',
//             'gender' => 'female',
//             'unit' => '745',
//             'barangay' => 'dampol1st',
//             'city' => 'pulilan',
//             'province' => 'bulacan',
//             'doctor_user_id' => '3',
//             'service_id' => ["13"],
//             'user_id' => '12',
//             'date' => '2024-04-29 00:00:00',
//         ]);
//     }
//     public function appointment7(): self
//     {
//         return $this->state([
//             'first' => 'alwina',
//             'middle' => 'cruz',
//             'last' => 'lopez',
//             'phone' => '09293015584',
//             'age' => '21',
//             'gender' => 'female',
//             'unit' => '103',
//             'barangay' => 'pinagbarilan',
//             'city' => 'baliuag',
//             'province' => 'bulacan',
//             'doctor_user_id' => '2',
//             'service_id' => ["14"],
//             'user_id' => '11',
//             'date' => '2024-06-05 00:00:00',
//         ]);
//     }
//     public function appointment8(): self
//     {
//         return $this->state([
//             'first' => 'jericho',
//             'middle' => '',
//             'last' => 'victoria',
//             'phone' => '09293015584',
//             'age' => '25',
//             'gender' => 'male',
//             'unit' => '695',
//             'barangay' => 'malamig',
//             'city' => 'bustos',
//             'province' => 'bulacan',
//             'doctor_user_id' => '3',
//             'service_id' => ["8"],
//             'user_id' => '13',
//             'date' => '2024-04-23 00:00:00',
//         ]);
//     }
//     public function appointment9(): self
//     {
//         return $this->state([
//             'first' => 'alma',
//             'middle' => '',
//             'last' => 'balbuena',
//             'phone' => '09293015584',
//             'age' => '29',
//             'gender' => 'female',
//             'unit' => '852',
//             'barangay' => 'sta cruz',
//             'city' => 'pulilan',
//             'province' => 'bulacan',
//             'doctor_user_id' => '2',
//             'service_id' => ["3"],
//             'user_id' => '14',
//             'date' => '2024-04-27 00:00:00',
//         ]);
//     }
//     public function appointment10(): self
//     {
//         return $this->state([
//             'first' => 'cris',
//             'middle' => '',
//             'last' => 'tupaz',
//             'phone' => '09293015584',
//             'age' => '30',
//             'gender' => 'male',
//             'unit' => '963',
//             'barangay' => 'paltao',
//             'city' => 'pulilan',
//             'province' => 'bulacan',
//             'doctor_user_id' => '4',
//             'service_id' => ["9"],
//             'user_id' => '16',
//             'date' => '2024-04-28 00:00:00',
//         ]);
//     }
//     public function appointment11(): self
//     {
//         return $this->state([
//             'first' => 'hogan',
//             'middle' => 'villanueva',
//             'last' => 'csntro',
//             'phone' => '09293015584',
//             'age' => '31',
//             'gender' => 'male',
//             'unit' => '753',
//             'barangay' => 'plaridel',
//             'city' => 'pulilan',
//             'province' => 'bulacan',
//             'doctor_user_id' => '2',
//             'service_id' => ["9"],
//             'user_id' => '15',
//             'date' => '2024-05-04 00:00:00',
//         ]);
//     }
// }
