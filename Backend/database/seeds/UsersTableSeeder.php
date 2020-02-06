<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Users
        User::create([
            'name' => 'Toni Krešić',
            'email' => 'tonikresic1997@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/Toni.jpeg',
            'signatures_count' => 7
        ]);

        User::create([
            'name' => 'Claudia Kupreš',
            'email' => 'claudiakupres@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/DefaultUserImage.png'
        ]);

        User::create([
            'name' => 'Rosemary Jensen',
            'email' => 'rosemary.jensen@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/3.jpg'
        ]);

        User::create([
            'name' => 'Vernon Weaver',
            'email' => 'vermon.weaver@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/92.jpg'
        ]);

        User::create([
            'name' => 'Jared Collins',
            'email' => 'jared.collins@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/33.jpg'
        ]);

        User::create([
            'name' => 'Dianne Kelley',
            'email' => 'dkelley@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/2.jpg'
        ]);

        User::create([
            'name' => 'Sofia Larson',
            'email' => 'sofia.larson@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/77.jpg'
        ]);

        User::create([
            'name' => 'Jeffrey Pearson',
            'email' => 'jeffrey.pearson@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/47.jpg'
        ]);

        User::create([
            'name' => 'Fernando Rodriguez',
            'email' => 'fernando.rodriguez@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/8.jpg'
        ]);

        User::create([
            'name' => 'Allison Hart',
            'email' => 'allison.hart@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/72.jpg'
        ]);

        User::create([
            'name' => 'Perry Powell',
            'email' => 'perry.powell@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/79.jpg'
        ]);

        User::create([
            'name' => 'Christine Medina',
            'email' => 'christine.medina@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/2.jpg'
        ]);

        User::create([
            'name' => 'Bessie Palmer',
            'email' => 'bessie.palmer@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/45.jpg'
        ]);

        User::create([
            'name' => 'Alexa Simpson',
            'email' => 'alexa.simpson@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/40.jpg'
        ]);

        User::create([
            'name' => 'April Gray',
            'email' => 'april.gray@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/75.jpg'
        ]);

        User::create([
            'name' => 'Kristina Anderson',
            'email' => 'kristina.anderson@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/55.jpg'
        ]);

        User::create([
            'name' => 'Stella Vargas',
            'email' => 'stella.vargas@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/29.jpg'
        ]);

        User::create([
            'name' => 'Randall Medina',
            'email' => 'randall.medina@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/32.jpg'
        ]);

        User::create([
            'name' => 'Hailey Edwards',
            'email' => 'hailey.edwards@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/23.jpg'
        ]);

        User::create([
            'name' => 'Brayden Lopez',
            'email' => 'brayden.lopez@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/67.jpg'
        ]);

        User::create([
            'name' => 'Cory Beck',
            'email' => 'cory.beck@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/99.jpg'
        ]);

        User::create([
            'name' => 'Jerome Holt',
            'email' => 'jerome.holt@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/24.jpg'
        ]);

        User::create([
            'name' => 'Kenneth Ramos',
            'email' => 'kenneth.ramos@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/95.jpg'
        ]);

        User::create([
            'name' => 'Edward Barnett',
            'email' => 'edward.barnett@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/22.jpg'
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'password' => Hash::make(102030),
            'img' => 'img/users/DefaultUserImage.png'
        ]);
    }
}