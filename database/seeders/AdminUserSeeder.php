<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@exemplo.com'],
            [
                'name' => 'Admin Principal',
                'password' => Hash::make('admin123'), // você pode mudar depois
                'is_admin' => true,
            ]
        );
    }
}
