<?php

namespace App\Http\Controllers\Staf;

use App\Events\PengajuanDitolak;
use App\Events\SuratDibuat;
use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\SuratAdministrasi;
use App\Models\SuratPengusulanTempatKPI;
use App\Models\SuratPembimbingTA;
use App\Models\SuratSeminarKPI;
use App\Models\SuratSeminarTA;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SuratController extends Controller
{
    use FileUpload;

    /**
     * Tampilkan halaman daftar surat untuk staf berdasarkan layanan yang diinginkan.
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
                          ->where('status', 'diajukan');
                })->paginate(15);
                break;
            case 'pengusulan-tempat-kpi':
                $daftarSurat = SuratPengusulanTempatKPI::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                          ->where('status', 'diajukan');
                })->paginate(15);
                break;
            case 'pembimbing-ta':
                $daftarSurat = SuratPembimbingTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                          ->where('status', 'diajukan');
                })->paginate(15);
                break;
            case 'seminar-kpi':
                $daftarSurat = SuratSeminarKPI::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                          ->where('status', 'diajukan');
                })->paginate(15);
                break;
            case 'seminar-proposal':
                $daftarSurat = SuratSeminarTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                          ->where('status', 'diajukan');
                })->paginate(15);
                break;
            case 'seminar-hasil':
                $daftarSurat = SuratSeminarTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                          ->where('status', 'diajukan');
                })->paginate(15);
                break;
            case 'seminar-tutup':
                $daftarSurat = SuratSeminarTA::whereHas('pengajuan', function ($query) use ($layanan) {
                    $query->where('layanan', $layanan)
                          ->where('status', 'diajukan');
                })->paginate(15);
                break;
            default:
                return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
        }

        return view('staf.surat', [
            'daftarSurat' => $daftarSurat,
            'layanan' => $layanan,
        ]);
    }

    /**
     * Menampilkan detail surat berdasarkan layanan dan pengajuan yang diinginkan.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @param Pengajuan $pengajuan Pengajuan yang diinginkan.
     * @return \Illuminate\View\View View detail surat.
     */
    public function show(string $layanan, Pengajuan $pengajuan)
    {
        return view('staf.surat-detail', [
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
     * Membuat surat administrasi berdasarkan data yang divalidasi dari request dan pengajuan.
     *
     * @param Request $request Request yang berisi data surat administrasi.
     * @param Pengajuan $pengajuan Objek pengajuan yang terkait dengan surat.
     */
    private function suratAdministrasi(Request $request, Pengajuan $pengajuan)
    {
        $data = $request->validate([
            'nomor' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'periode' => 'required|string',
            'tanggal_surat' => 'required|date',
        ]);

        $surat = SuratAdministrasi::where('pengajuan_id', $pengajuan->id)->first();

        $data['layanan'] = $pengajuan->layanan;
        $data['pengajuan_id'] = $pengajuan->id;

        if ($surat) {
            $surat->update($data);
            return;
        }

        SuratAdministrasi::create($data);
    }

    /**
     * Membuat surat pembimbingan Tugas Akhir berdasarkan data yang divalidasi dari request dan pengajuan.
     *
     * @param Request $request Request yang berisi data surat pembimbingan Tugas Akhir.
     * @param Pengajuan $pengajuan Objek pengajuan yang terkait dengan surat.
     */
    private function suratPembimbingTA(Request $request, Pengajuan $pengajuan)
    {
        $data = $request->validate([
            'semester' => 'required|in:ganjil,genap',
            'tahun_ajaran' => 'required|string',
            'nomor' => 'required|string',
            'pembimbing' => 'required|string',
            'judul_skripsi' => 'required|string',
            'tanggal_surat' => 'required|date',
        ]);

        $surat = SuratPembimbingTA::where('pengajuan_id', $pengajuan->id)->first();

        $data['layanan'] = $pengajuan->layanan;
        $data['pengajuan_id'] = $pengajuan->id;

        if ($surat) {
            $surat->update($data);
            return;
        }

        SuratPembimbingTA::create($data);
    }

    /**
     * Membuat surat pembimbingan KPI berdasarkan data yang divalidasi dari request dan pengajuan.
     *
     * @param Request $request Request yang berisi data surat pembimbingan KPI.
     * @param Pengajuan $pengajuan Objek pengajuan yang terkait dengan surat.
     */
    private function SuratPengusulanTempatKPI(Request $request, Pengajuan $pengajuan)
    {
        $data = $request->validate([
            'nomor' => 'required|string',
            'pembimbing' => 'required|string',
            'mahasiswa' => 'required|string',
            'tanggal_surat' => 'required|date',
        ]);

        $surat = SuratPengusulanTempatKPI::where('pengajuan_id', $pengajuan->id)->first();

        $data['layanan'] = $pengajuan->layanan;
        $data['pengajuan_id'] = $pengajuan->id;

        if ($surat) {
            $surat->update($data);
            return;
        }

        SuratPengusulanTempatKPI::create($data);
    }

    /**
     * Membuat surat seminar Tugas Akhir berdasarkan data yang divalidasi dari request dan pengajuan.
     *
     * @param Request $request Request yang berisi data surat seminar Tugas Akhir.
     * @param Pengajuan $pengajuan Objek pengajuan yang terkait dengan surat.
     */
    private function suratSeminarTA(Request $request, Pengajuan $pengajuan)
    {
        $data = $request->validate([
            // surat seminar
            'nomor_sk' => 'required|string',
            'ketua_sekertaris' => 'required|string',
            'pembimbing' => 'required|string',
            'penguji' => 'required|string',
            'judul_skripsi' => 'required|string',
            'tanggal_surat' => 'required|date',

            // surat undangan
            'nomor_undangan' => 'required|string',
            'tanggal_ujian' => 'required|date',
            'waktu' => 'required|string',
            'tempat' => 'required|string',
        ]);

        $surat = SuratSeminarTA::where('pengajuan_id', $pengajuan->id)->first();

        $data['layanan'] = $pengajuan->layanan;
        $data['pengajuan_id'] = $pengajuan->id;

        if ($surat) {
            $surat->update($data);
            return;
        }

        SuratSeminarTA::create($data);
    }

    /**
     * Membuat surat seminar KPI berdasarkan data yang divalidasi dari request dan pengajuan.
     *
     * @param Request $request Request yang berisi data surat seminar KPI.
     * @param Pengajuan $pengajuan Objek pengajuan yang terkait dengan surat.
     */
    private function suratSeminarKPI(Request $request, Pengajuan $pengajuan)
    {
        $data = $request->validate([
            'nomor' => 'required|string',
            'pembimbing' => 'required|string',
            'penguji' => 'required|string',
            'mahasiswa' => 'required|string',
            'tempat_kpi' => 'required|string',
            'tanggal_ujian' => 'required|date',
            'waktu' => 'required|string',
            'tempat' => 'required|string',
            'tanggal_surat' => 'required|date',
        ]);

        $surat = SuratSeminarKPI::where('pengajuan_id', $pengajuan->id)->first();

        $data['layanan'] = $pengajuan->layanan;
        $data['pengajuan_id'] = $pengajuan->id;

        if ($surat) {
            $surat->update($data);
            return;
        }

        SuratSeminarKPI::create($data);
    }

    /**
     * Menyetujui pengajuan berdasarkan layanan dan pengajuan yang diinginkan.
     *
     * @param Request $request Request yang berisi data surat yang akan dibuat.
     * @param string $layanan Nama layanan yang diinginkan.
     * @param Pengajuan $pengajuan Pengajuan yang diinginkan.
     * @return \Illuminate\Http\RedirectResponse Redirect ke halaman layanan staf dengan pesan sukses.
     */
    public function terima(Request $request, string $layanan, Pengajuan $pengajuan)
    {
        $layanan = config('layanan')[$layanan]['tipe'];

        switch ($layanan) {
            case 'administrasi':
                $this->suratAdministrasi($request, $pengajuan);
                break;
            case 'seminar-ta':
                $this->suratSeminarTA($request, $pengajuan);
                break;
            case 'seminar-kpi':
                $this->suratSeminarKPI($request, $pengajuan);
                break;
            case 'pembimbing-ta':
                $this->suratPembimbingTA($request, $pengajuan);
                break;
            case 'pengusulan-tempat-kpi':
                $this->SuratPengusulanTempatKPI($request, $pengajuan);
                break;
            default:
                return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
        }

        // Surat sudah dibuat oleh staf,
        // selanjutnya menunggu persetujuan Wakil Dekan
        $pengajuan->update([
            'status' => 'menunggu_wakil_dekan',
        ]);

        event(new SuratDibuat($pengajuan));

        return to_route('staf.surat', $pengajuan->layanan)
        ->with('success', 'Surat berhasil dibuat dan menunggu persetujuan Wakil Dekan');
    }

    /**
     * Menolak pengajuan berdasarkan layanan dan pengajuan yang diinginkan.
     *
     * @param Request $request Request yang berisi alasan penolakan.
     * @param string $layanan Nama layanan yang diinginkan.
     * @param Pengajuan $pengajuan Pengajuan yang diinginkan.
     * @return \Illuminate\Http\RedirectResponse Redirect ke halaman layanan staf dengan pesan sukses.
     */
    public function tolak(Request $request, string $layanan, Pengajuan $pengajuan)
    {
        $request->validate([
            'alasan' => 'required|string',
        ]);

        $pengajuan->ditolak = true;
        $pengajuan->alasan_ditolak = $request->alasan;
        $pengajuan->status = 'ditolak';

        $pengajuan->update();

        event(new PengajuanDitolak($pengajuan));

        return to_route('staf.layanan', $layanan)->with('success', 'Pengajuan berhasil ditolak');
    }
}
