<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Role;
use App\Models\Service;
use App\Models\Category;
use App\Models\Appointment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
        ]);
        $roleTypes = ['admin', 'doctor', 'staff', 'dentist', 'patient'];
        $categories = ['service', 'partial', 'upper', 'denture', 'veneer'];
        $services = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve',
         'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen', 'twenty', 'twentyOne', 'twentyTwo', 'twentyThree', 'twentyFour', 'twentyFive',];
        $users = ['user1', 'user2', 'user3','user4' ];
        $appointments = ['appointment1', 'appointment2', 'appointment3', 'appointment4', 'appointment5', 'appointment6', 'appointment7', 'appointment8', 'appointment9', 'appointment10', 'appointment11',
        'appointment12', 'appointment13', 'appointment14', 'appointment15', 'appointment16', 'appointment17', 'appointment18', 'appointment19', 'appointment20', 'appointment21', 'appointment22',
        'appointment23', 'appointment24', 'appointment25', 'appointment26', 'appointment27', 'appointment28', 'appointment29','appointment30','appointment31','appointment32', 'appointment33', 'appointment34',
        'appointment35', 'appointment36', 'appointment37', 'appointment38', 'appointment39', 'appointment40', 'appointment41', 'appointment42', 'appointment42', 'appointment43', 'appointment44', 'appointment45', 'appointment46', 'appointment47',
'appointment48', 'appointment49', 'appointment50', 'appointment51', 'appointment52', 'appointment53', 'appointment54', 'appointment55', 'appointment56', 'appointment57', 'appointment58', 'appointment59', 'appointment60', 'appointment61', 'appointment62',
'appointment62', 'appointment63', 'appointment64', 'appointment65', 'appointment66', 'appointment67', 'appointment68',

    ];


        foreach ($roleTypes as $roleType) {
            Role::factory()->$roleType()->create();
        }

        foreach ($categories as $category) {
            Category::factory()->$category()->create();
        }

        foreach ($services as $service) {
            Service::factory()->$service()->create();
        }
        foreach ($users as $user) {
            User::factory()->$user()->create();
        }
        foreach ($appointments as $appointment) {
            Appointment::factory()->$appointment()->create();
        }
        User::factory()->count(50)->create();
    }

}
