<?php

namespace App\Http\Controllers\Dekan;

use App\Events\PengajuanDitolak;
use App\Events\SuratSelesai;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\SuratSeminarTA;
use App\Models\SuratSeminarKPI;
use App\Models\SuratAdministrasi;
use App\Models\SuratPembimbingTA;
use App\Models\SuratPengusulanTempatKPI;
use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Tandatangan;
use Illuminate\Http\RedirectResponse;

class SuratController extends Controller
{
    /**
     * Menampilkan halaman daftar surat untuk Dekan berdasarkan layanan yang diinginkan.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @return View|RedirectResponse View daftar surat jika layanan ditemukan, atau RedirectResponse jika layanan tidak ditemukan.
     */
    public function index($layanan): View|RedirectResponse
    {
        switch ($layanan) {
            case 'bebas-matakuliah':
                $daftarSurat = SuratAdministrasi::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                            ->where('status', 'menunggu_dekan');
                })->paginate(15);
                break;
            case 'pengusulan-tempat-kpi':
                $daftarSurat = SuratPengusulanTempatKPI::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                            ->where('status', 'menunggu_dekan');
                })->paginate(15);
                break;
            case 'pembimbing-ta':
                $daftarSurat = SuratPembimbingTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                            ->where('status', 'menunggu_dekan');
                })->paginate(15);
                break;
            case 'seminar-kpi':
                $daftarSurat = SuratSeminarKPI::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                            ->where('status', 'menunggu_dekan');
                })->paginate(15);
                break;
            case 'seminar-proposal':
                $daftarSurat = SuratSeminarTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                            ->where('status', 'menunggu_dekan');
                })->paginate(15);
                break;
            case 'seminar-hasil':
                $daftarSurat = SuratSeminarTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                            ->where('status', 'menunggu_dekan');
                })->paginate(15);
                break;
            case 'seminar-tutup':
                $daftarSurat = SuratSeminarTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                            ->where('status', 'menunggu_dekan');
                })->paginate(15);
                break;
            default:
                return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
        }

        return view('dekan.surat', [
            'daftarSurat' => $daftarSurat,
            'layanan' => $layanan,
        ]);
    }

    /**
     * Menampilkan detail surat berdasarkan layanan dan pengajuan yang diinginkan.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @param Pengajuan $pengajuan Pengajuan yang diinginkan.
     * @return View View detail surat.
     */
    public function show(string $layanan, Pengajuan $pengajuan)
    {
        return view('dekan.surat-detail', [
            'pengajuan' => $pengajuan,
            'layanan' => $layanan,
        ]);
    }


    /**
     * Menampilkan surat berdasarkan layanan dan pengajuan yang diinginkan dalam format PDF.
     *
     * @param Request $request Request yang dikirimkan.
     * @param string $layanan Nama layanan yang diinginkan.
     * @param Pengajuan $pengajuan Pengajuan yang diinginkan.
     * @return \Illuminate\Http\Response Response PDF surat.
     */
    public function pdf(Request $request, string $layanan, Pengajuan $pengajuan)
    {
        $jenis = $request->get('jenis') ?? 'surat';

        $layanan = config('layanan')[$layanan];
        $surat = $pengajuan->surat;

        if ($surat->ttd) {
            $ttd = base64_encode(generateQr(url('/') . '/surat?id=' . $pengajuan->uuid));
        } else {
            $ttd = null;
        }

        return pdf($layanan['pdf'][$jenis], [
            'layanan' => $layanan,
            'pengajuan' => $pengajuan,
            'surat' => $surat,
            'ttd' => $ttd,
        ]);
    }

    /**
     * Menyetujui surat berdasarkan layanan dan pengajuan yang diinginkan.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @param Pengajuan $pengajuan Pengajuan yang diinginkan.
     * @return RedirectResponse Redirect ke halaman daftar surat dengan pesan sukses.
     */
    public function terima(string $layanan, Pengajuan $pengajuan)
    {
        if ($pengajuan->status !== 'menunggu_dekan') {
            return back()->with(
                'error',
                'Pengajuan ini belum sampai pada tahap persetujuan Dekan.'
            );
        }

        $user = auth('dekan')->user();

        $ttd = new Tandatangan([
            'nuptk' => $user->nuptk,
            'nama' => $user->nama,
        ]);

        $pengajuan->surat->ttd()->save($ttd);

        $pengajuan->update([
            'status' => 'selesai',
        ]);

        event(new SuratSelesai($pengajuan));

        return to_route('dekan.surat', $layanan)
            ->with('success', 'Surat berhasil disetujui dan ditandatangani.');
    }

    /**
     * Menolak surat berdasarkan layanan dan pengajuan yang diinginkan.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @param Pengajuan $pengajuan Pengajuan yang diinginkan.
     * @return RedirectResponse Redirect ke halaman daftar surat dengan pesan sukses.
     */
    public function tolak(string $layanan, Pengajuan $pengajuan)
    {
        if ($pengajuan->status !== 'menunggu_dekan') {
            return back()->with(
                'error',
                'Pengajuan ini belum sampai pada tahap persetujuan Dekan.'
            );
        }

        $pengajuan->ditolak = true;
        $pengajuan->alasan_ditolak = 'Berkas ditolak oleh Dekan. Silahkan ajukan ulang dengan berkas yang benar.';
        $pengajuan->status = 'ditolak';

        $pengajuan->surat->delete();

        $pengajuan->update();

        event(new PengajuanDitolak($pengajuan));

        return to_route('dekan.surat', $layanan)
            ->with('success', 'Surat berhasil ditolak');
    }
}
