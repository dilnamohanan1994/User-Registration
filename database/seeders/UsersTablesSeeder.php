<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'Dilna',
            'email'    => 'dilna@gmail.com',
            'password'   =>  \Hash::make('password'),
            'remember_token' => Str::random(32)
        ]);
    }
}
