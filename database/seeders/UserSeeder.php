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
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Sarpras',
                'email' => 'admin.sarpras@alhasra.sch.id',
                'role' => 'admin',
                'password' => Hash::make('sarpras49')
            ],
            [
                'name' => 'Yayasan Al-hasra',
                'email' => 'yayasan.sarpras@alhasra.sch.id',
                'role' => 'user',
                'password' => Hash::make('sarprasyayasan77')
            ],
            [
                'name' => 'SMA Al-hasra',
                'email' => 'sma.sarpras@alhasra.sch.id',
                'role' => 'user',
                'password' => Hash::make('sarprassma32')
            ],
            [
                'name' => 'SMP Al-hasra',
                'email' => 'smp.sarpras@alhasra.sch.id',
                'role' => 'user',
                'password' => Hash::make('sarprassmp78')
            ],
            [
                'name' => 'SMK Al-hasra',
                'email' => 'smk.sarpras@alhasra.sch.id',
                'role' => 'user',
                'password' => Hash::make('sarprassmk65')
            ],
        ];

        // Menyimpan data ke dalam tabel users
        foreach ($users as $key => $val) {
            User::create($val);
        }
    }
}
