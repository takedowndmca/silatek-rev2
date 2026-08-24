<?php

namespace Database\Seeders;

use App\Models\PersyaratanBerkas;
use Illuminate\Database\Seeder;

class PersyaratanBerkasSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('layanan') as $layanan => $data) {
            foreach ($data['persyaratan'] ?? [] as $index => $nama) {
                PersyaratanBerkas::create([
                    'layanan' => $layanan,
                    'nama' => $nama,
                    'keterangan' => $data['keterangan'][$index] ?? null,
                ]);
            }
        }
    }
}
