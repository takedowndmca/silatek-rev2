<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class DeleteOldPengajuanFiles extends Command
{
    protected $signature = 'pengajuan:cleanup-files';

    protected $description = 'Menghapus file pengajuan yang berumur lebih dari 7 hari';

    public function handle(): int
    {
        $directory = public_path('files/pengajuan');

        if (!File::isDirectory($directory)) {
            $this->error("Folder tidak ditemukan: {$directory}");

            return self::FAILURE;
        }

        $batasWaktu = Carbon::now()->subDays(7)->timestamp;
        $jumlahDihapus = 0;

        // Memeriksa semua file di seluruh subfolder secara rekursif
        foreach (File::allFiles($directory) as $file) {
            if ($file->getMTime() < $batasWaktu) {
                File::delete($file->getPathname());

                $jumlahDihapus++;

                $this->line("Dihapus: {$file->getRelativePathname()}");
            }
        }

        $this->info("Selesai. {$jumlahDihapus} file dihapus.");

        return self::SUCCESS;
    }
}
