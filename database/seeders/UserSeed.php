<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'nome' => 'admin',
            'matricula' => '12345678',
            'role' => '1',
            'password' => '12345678',
        ]);

        $user2 = User::create([
            'nome'=>'user',
            'matricula'=>'87654321',
            'role'=>'0',
            'password'=>'87654321',

        ]);
    }
}
