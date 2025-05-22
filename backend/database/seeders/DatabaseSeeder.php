<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'surname' => 'Admin',
            'name' => 'Super',
            'patronymic' => '',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'active' => true,
        ]);
    }
}
