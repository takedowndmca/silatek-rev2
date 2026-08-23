<?php

namespace App\Http\Controllers\WakilDekan;

use App\Events\PengajuanDitolak;
use App\Events\SuratDibuat;
use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\SuratAdministrasi;
use App\Models\SuratPembimbingKPI;
use App\Models\SuratPembimbingTA;
use App\Models\SuratSeminarKPI;
use App\Models\SuratSeminarTA;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SuratController extends Controller
{
    /**
     * Menampilkan surat yang menunggu persetujuan Wakil Dekan.
     */
    public function index($layanan): View|RedirectResponse
    {
        switch ($layanan) {

            case 'bebas-matakuliah':
                $daftarSurat = SuratAdministrasi::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                        ->where('status', 'menunggu_wakil_dekan');
                })
                ->with('pengajuan')
                ->paginate(15);
                break;

            case 'pembimbing-kpi':
                $daftarSurat = SuratPembimbingKPI::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                        ->where('status', 'menunggu_wakil_dekan');
                })
                ->with('pengajuan')
                ->paginate(15);
                break;

            case 'pembimbing-ta':
                $daftarSurat = SuratPembimbingTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                        ->where('status', 'menunggu_wakil_dekan');
                })
                ->with('pengajuan')
                ->paginate(15);
                break;

            case 'seminar-kpi':
                $daftarSurat = SuratSeminarKPI::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                        ->where('status', 'menunggu_wakil_dekan');
                })
                ->with('pengajuan')
                ->paginate(15);
                break;

            case 'seminar-proposal':
                $daftarSurat = SuratSeminarTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                        ->where('status', 'menunggu_wakil_dekan');
                })
                ->with('pengajuan')
                ->paginate(15);
                break;

            case 'seminar-hasil':
                $daftarSurat = SuratSeminarTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                        ->where('status', 'menunggu_wakil_dekan');
                })
                ->with('pengajuan')
                ->paginate(15);
                break;

            case 'seminar-tutup':
                $daftarSurat = SuratSeminarTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                        ->where('status', 'menunggu_wakil_dekan');
                })
                ->with('pengajuan')
                ->paginate(15);
                break;

            default:
                return redirect()->back()
                    ->with('error', 'Layanan tidak ditemukan.');
        }

        return view('wakil-dekan.surat', [
            'daftarSurat' => $daftarSurat,
            'layanan' => $layanan,
        ]);
    }


    /**
     * Menampilkan detail pengajuan.
     */
    public function show(string $layanan, Pengajuan $pengajuan): View
    {
        return view('wakil-dekan.surat-detail', [
            'pengajuan' => $pengajuan,
            'layanan' => $layanan,
        ]);
    }


    /**
     * Wakil Dekan menyetujui pengajuan.
     *
     * Tidak membuat TTD.
     * Hanya meneruskan status ke Dekan.
     */
    public function terima(
        string $layanan,
        Pengajuan $pengajuan
    ): RedirectResponse {

        if ($pengajuan->status !== 'menunggu_wakil_dekan') {
            return back()->with(
                'error',
                'Pengajuan ini belum sampai pada tahap persetujuan Wakil Dekan.'
            );
        }

        $pengajuan->update([
            'status' => 'menunggu_dekan',
        ]);

        return to_route('wakil_dekan.surat', $layanan)
            ->with(
                'success',
                'Pengajuan berhasil disetujui dan diteruskan ke Dekan.'
            );
    }


    /**
     * Wakil Dekan menolak pengajuan.
     */
    public function tolak(
        string $layanan,
        Pengajuan $pengajuan
    ): RedirectResponse {

        if ($pengajuan->status !== 'menunggu_wakil_dekan') {
            return back()->with(
                'error',
                'Pengajuan ini belum sampai pada tahap persetujuan Wakil Dekan.'
            );
        }

        $pengajuan->update([
            'status' => 'ditolak',
            'ditolak' => true,
            'alasan_ditolak' =>
                'Berkas ditolak oleh Wakil Dekan. Silahkan ajukan ulang dengan berkas yang benar.',
        ]);

        event(new PengajuanDitolak($pengajuan));

        return to_route('wakil_dekan.surat', $layanan)
            ->with('success', 'Pengajuan berhasil ditolak.');
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
}