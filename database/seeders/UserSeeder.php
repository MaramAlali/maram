<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'John',
            'password'=>Hash::make('admin'),
            'email'=>'admin@example.com',
        ]);
     $token =$user->createToken('AdminToken')->plainTextToken;

     $user->assignRole('admin');

     $user=User::create([
        'name'=>'Maram',
        'password'=>Hash::make('member'),
        'email'=>'Maram@example.com',
    ]);
    $token =$user->createToken('UserToken')->plainTextToken;

    $user->assignRole('member');

    }
}

