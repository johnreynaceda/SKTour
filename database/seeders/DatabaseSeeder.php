<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Municipality;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::create([
        'name' => 'Tourist',
        'email' => 'tourist@gmail.com',
        'password' => bcrypt('password'),
        'user_type' => 'tourist',
        'is_approved' => true,
        'fullname' => 'Tourist',
       ]);

       User::create([
        'name' => 'Tourist Spot',
        'email' => 'touristSpot@gmail.com',
        'password' => bcrypt('password'),
        'user_type' => 'tourist spot',
        'is_approved' => true,
        'fullname' => 'Tourist Spot',
       ]);

       User::create([
        'name' => 'Provincial Tourism',
        'email' => 'provincial@gmail.com',
        'password' => bcrypt('password'),
        'user_type' => 'provincial',
        'is_approved' => true,
        'fullname' => 'Provincial Tourism',
       ]);

//$municipality = Municipality
       $municipality = Municipality::create([
        'name'=> 'Bagumbayan',
        ]);
        User::create([
            'name' => 'Bagumbayan',
            'email' => 'bagumbayan@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Bagumbayan',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'Columbio',
        ]);
        User::create([
            'name' => 'Columbio',
            'email' => 'columbio@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Columbio',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'Esperanza',
        ]);
        User::create([
            'name' => 'Esperanza',
            'email' => 'esperanza@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Esperanza',
           'municipality_id' => $municipality->id,
        ]);


        $municipality = Municipality::create([
            'name'=> 'Isulan',
        ]);
        User::create([
            'name' => 'Isulan',
            'email' => 'isulan@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Isulan',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'Kalamansig',
        ]);
        User::create([
            'name' => 'Kalamansig',
            'email' => 'kalamansig@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Kalamansig',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'Lambayong',
        ]);
        User::create([
            'name' => 'Lambayong',
            'email' => 'lambayong@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Lambayong',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'Lebak',
        ]);
        User::create([
            'name' => 'Lebak',
            'email' => 'lebak@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Lebak',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'Lutayan',
        ]);
        User::create([
            'name' => 'Lutayan',
            'email' => 'lutayan@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Lutayan',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'Palimbang',
        ]);
        User::create([
            'name' => 'Palimbang',
            'email' => 'palimbang@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Palimbang',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'President Quirino',
        ]);
        User::create([
            'name' => 'President Quirino',
            'email' => 'presidentquirino@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'President Quirino',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'Senator Ninoy Aquino',
        ]);
        User::create([
            'name' => 'Senator Ninoy Aquino',
            'email' => 'sna@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Senator Ninoy Aquino',
           'municipality_id' => $municipality->id,
        ]);

        $municipality = Municipality::create([
            'name'=> 'Tacurong City',
        ]);
        User::create([
            'name' => 'Tacurong City',
            'email' => 'tacurong@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'municipal',
            'is_approved' => true,
            'fullname' => 'Tacurong City',
           'municipality_id' => $municipality->id,
        ]);


    }




}
