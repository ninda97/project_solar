<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        $user = User::create([
            'name'     => 'Admin',
            'email'         =>  'admin@admin.com',
            'chatid' =>  '9028187696',
            'password'      =>  Hash::make('admin'),
            'role_id'       => 1
        ]);

        $staff_permission = User::create([
            'name'     => 'Ninda',
            'email'         =>  'ninda@gmail.com',
            'chatid' =>  '5127815236',
            'password'      =>  Hash::make('qwerty123'),
            'role_id'       => 2
        ]);
    }
}
