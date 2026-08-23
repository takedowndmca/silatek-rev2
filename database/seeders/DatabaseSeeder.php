<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Dekan;
use App\Models\Staf;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            ProdiSeeder::class,
            PersyaratanBerkasSeeder::class,
        ]);

        Admin::create([
            'nama' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        Dekan::create([
            'nuptk' => '7033758659137130',
            'nama' => 'Dr. Ir. Saripuddin M, S.T., M.T',
            'email' => 'dekan@example.com',
            'password' => Hash::make('password'),
            'jabatan' => 'dekan',
        ]);

        Dekan::create([
            'nuptk' => '3958752653130132',
            'nama' => 'Fadhli Rahman, ST., MT',
            'email' => 'wadek@example.com',
            'password' => Hash::make('password'),
            'jabatan' => 'wakil_dekan',
        ]);

        Staf::create([
            'nama' => 'Staf',
            'email' => 'staf@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nim' => '18024014111',
            'nama' => 'Awal',
            'angkatan' => 2018,
            'prodi_id' => 1,
            'no_telp' => '081234567890',
            'email' => 'awal@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
