<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    /**
     * Dashboard Kaprodi
     */
    public function index(): View
    {
        $kaprodi = auth('kaprodi')->user();

        $pengajuan = Pengajuan::whereHas('user', function ($query) use ($kaprodi) {
            $query->where('prodi_id', $kaprodi->prodi_id);
        })
        ->with([
            'user',
            'berkas',
            'suratAdministrasi',
            'suratSeminarTA',
            'suratSeminarKPI',
            'suratPembimbingTA',
            'suratPembimbingKPI',
            'suratIzinPenelitian',
            'SuratPengusulanTempatKPI',
        ])
        ->latest()
        ->paginate(15);

        return view('kaprodi.dashboard', [
            'pengajuan' => $pengajuan,
        ]);
    }
    public function index2(): View
    {
        $kaprodi = auth('kaprodi')->user();

        $pengajuan = Pengajuan::whereHas('user', function ($query) use ($kaprodi) {
            $query->where('prodi_id', $kaprodi->prodi_id);
        })
        ->with(['user', 'berkas'])
        ->latest()
        ->paginate(15);

        return view('kaprodi.dashboard', [
            'pengajuan' => $pengajuan,
        ]);
    }

    /**
     * Preview / Generate PDF surat
     */
    public function pdf(Request $request, string $layanan, Pengajuan $pengajuan)
    {
        $kaprodi = auth('kaprodi')->user();

        // Pastikan pengajuan berasal dari prodi Kaprodi
        if (!$pengajuan->user || $pengajuan->user->prodi_id !== $kaprodi->prodi_id) {
            abort(403);
        }

        // Pastikan layanan tersedia
        $configLayanan = config('layanan');

        if (!isset($configLayanan[$layanan])) {
            abort(404);
        }

        $layananConfig = $configLayanan[$layanan];

        $jenis = $request->get('jenis', 'surat');

        // Pastikan jenis PDF tersedia
        if (!isset($layananConfig['pdf'][$jenis])) {
            abort(404);
        }

        $surat = $pengajuan->surat;

        if (!$surat) {
            abort(404, 'Surat belum tersedia.');
        }

        if ($surat->ttd) {
            $ttd = base64_encode(
                generateQr(url('/') . '/surat?id=' . $pengajuan->uuid)
            );
        } else {
            $ttd = null;
        }

        return pdf($layananConfig['pdf'][$jenis], [
            'layanan' => $layananConfig,
            'pengajuan' => $pengajuan,
            'surat' => $surat,
            'ttd' => $ttd,
        ]);
    }

    /**
     * Menghapus pengajuan mahasiswa
     */
    public function destroy2(Pengajuan $pengajuan): RedirectResponse
    {
        $kaprodi = auth('kaprodi')->user();

        // Pastikan Kaprodi hanya bisa menghapus
        // pengajuan mahasiswa dari prodinya sendiri.
        if ($pengajuan->user->prodi_id !== $kaprodi->prodi_id) {
            abort(403);
        }

        $pengajuan->delete();

        return back()->with('success', 'Pengajuan berhasil dihapus.');
    }
    public function destroy(Pengajuan $pengajuan): RedirectResponse
{
    $kaprodi = auth('kaprodi')->user();

    // Pastikan Kaprodi hanya bisa menghapus
    // pengajuan mahasiswa dari prodinya sendiri.
    if (!$pengajuan->user || $pengajuan->user->prodi_id !== $kaprodi->prodi_id) {
        abort(403);
    }

    // Ambil semua berkas pengajuan
    $pengajuan->load('berkas');

    // Hapus file fisik
    foreach ($pengajuan->berkas as $berkas) {

        $path = public_path(
            'files/pengajuan/' .
            $pengajuan->layanan .
            '/' .
            $berkas->file
        );

        if (File::exists($path)) {
            File::delete($path);
        }
    }

    // Hapus data pengajuan
    // Relasi pengajuan_berkas akan ikut terhapus
    // jika foreign key menggunakan cascade.
    $pengajuan->delete();

    return back()->with('success', 'Pengajuan dan seluruh berkas berhasil dihapus.');
}
}
