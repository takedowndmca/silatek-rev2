<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait FileUpload
{
    /**
     * Upload file ke server.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $path
     * @return string
     */
    public function uploadFile($file, $path, $nama = null)
    {
        // Jika nama berkas diberikan, gunakan nama tersebut
        // Jika tidak, gunakan nama asli file
        // $namaFile = $nama ?? pathinfo(
        //     $file->getClientOriginalName(),
        //     PATHINFO_FILENAME
        // );

        // // Bersihkan nama file
        // $namaFile = Str::slug($namaFile, '_');

        // // Tambahkan timestamp dalam milidetik agar unik
        // $filename = $namaFile . '_' . now()->format('YmdHisv') . '.' . $file->extension();
        $filename = Str::uuid() . '.' . $file->extension();

        $file->move(public_path($path), $filename);

        return $filename;
    }

    /**
     * Hapus file dari server.
     *
     * @param  string  $filename
     * @param  string  $path
     * @return void
     */
    public function deleteFile($filename, $path)
    {
        if (file_exists(public_path($path . '/' . $filename))) {
            File::delete(public_path($path . '/' . $filename));
        }
    }
}
