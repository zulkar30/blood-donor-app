<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'           => 'Zulkarnain',
                'email'          => 'zulkar300300@gmail.com',
                'password'       => Hash::make('ZulKarNain30'),
                'remember_token' => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
        ];

        User::insert($user);
    }
}
