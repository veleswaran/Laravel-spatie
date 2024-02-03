<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name ='Super Admin';
        $user->email ='superadmin@gmail.com';
        $user->password = Hash::make('Vels344@');
        $user->save();
        $user->assignRole('Super Admin');

    }
}
