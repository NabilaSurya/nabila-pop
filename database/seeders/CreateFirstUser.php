<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data['name']     = 'nabila';
        $data['email']    = 'nabila@gmail.com';
        $data['password'] = Hash::make('nabila123');
        User::create($data);
    }
}
