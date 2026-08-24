<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\PersyaratanBerkas;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengajuanController extends Controller
{
    use FileUpload;

    /**
     * Tampilkan halaman pengajuan staf.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @return \Illuminate\View\View
     */
    public function index($layanan): View
    {
        $daftarPengajuan = Pengajuan::where('layanan', $layanan)
            ->with(['berkas'])
            ->doesntHave('suratAdministrasi')
            ->doesntHave('suratSeminarTA')
            ->doesntHave('suratSeminarKPI')
            ->doesntHave('suratPembimbingTA')
            ->doesntHave('SuratPengusulanTempatKPI')
            ->orderBy('ditolak', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('staf.pengajuan', [
            'daftarPengajuan' => $daftarPengajuan,
            'layanan' => $layanan,
        ]);
    }

    /**
     * Menampilkan detail pengajuan berdasarkan layanan dan pengajuan.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @param Pengajuan $pengajuan Pengajuan yang diinginkan.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(string $layanan, Pengajuan $pengajuan): View|RedirectResponse
    {
        // dd($pengajuan->berkas->toArray());
        $berkas = PersyaratanBerkas::where('layanan', $layanan)->get();

        if ($berkas->count() != $pengajuan->berkas->count()) {
            return to_route('staf.layanan', $layanan)->with('error', 'Pengajuan belum lengkap');
        }

        return view('staf.pengajuan.' . config('layanan')[$layanan]['view'], [
            'pengajuan' => $pengajuan,
            'layanan' => $layanan,
        ]);
    }
}
