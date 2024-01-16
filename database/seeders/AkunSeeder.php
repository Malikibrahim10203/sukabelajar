<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name'   => 'nurudin rahman',
                'username'      => 'nurudin',
                'email'         => 'nurudin@example.com',
                'password'      =>  bcrypt('password'),
                'level'         => 'pengejar',
            ]
            ];

            foreach ($user as $key => $value)
            {
                User::create($value);
            }
    }
}
