<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\View\View;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use App\Models\PengajuanBerkas;
use App\Events\PengajuanTerkirim;
use App\Models\PersyaratanBerkas;
use Illuminate\Http\RedirectResponse;
use App\Jobs\SendNotifikasiPengajuanTerkirim;
use Illuminate\Routing\Controllers\HasMiddleware;

class PengajuanController extends Controller implements HasMiddleware
{
    use FileUpload;

    /**
     * Method middleware digunakan untuk mengatur middleware yang
     * akan digunakan dalam controller ini. Dalam hal ini, middleware
     * yang digunakan adalah 'user-only', yang berfungsi untuk
     * memastikan bahwa hanya user yang dapat mengakses halaman ini.
     *
     * @return array
     */
    public static function middleware(): array
    {
        return [
            'user-only',
        ];
    }

    /**
     * Tampilkan halaman pengajuan.
     *
     * @param string $layanan Nama layanan yang diinginkan.
     * @return \Illuminate\View\View
     */
    public function index($layanan): View
    {
        $berkas = PersyaratanBerkas::where('layanan', $layanan)->get();

        $pengajuan = Pengajuan::where('nim', auth('user')->user()->nim)
            ->where('layanan', $layanan)
            ->first();

        if ($pengajuan && !$pengajuan->ditolak) {
            return view('pengajuan-terkirim', [
                'layanan' => $layanan,
                'pengajuan' => $pengajuan,
            ]);
        }

        return view('pengajuan', [
            'mahasiswa' => auth('user')->user(),
            'daftarBerkas' => $berkas,
            'layanan' => $layanan,
            'pengajuan' => $pengajuan,
        ]);
    }

    /**
     * Menyimpan pengajuan baru berdasarkan layanan yang diinginkan.
     *
     * @param \Illuminate\Http\Request $request Request yang berisi data berkas yang akan diunggah.
     * @param string $layanan Nama layanan yang diinginkan.
     * @return \Illuminate\Http\RedirectResponse Redirect ke halaman sebelumnya dengan pesan sukses atau error.
     *
     * Proses:
     * - Memvalidasi data berkas yang diunggah.
     * - Memeriksa apakah pengajuan sudah ada dan tidak ditolak, jika ya, kembalikan error.
     * - Jika pengajuan ada dan ditolak, hapus berkas lama dan pengajuan.
     * - Periksa apakah jumlah berkas sesuai dengan persyaratan.
     * - Buat pengajuan baru dan simpan data berkas yang diunggah.
     * - Kembalikan pesan sukses setelah pengajuan berhasil dikirim.
     */

    public function store(Request $request, $layanan): RedirectResponse
    {
        $request->validate([
            'berkas' => 'required|array',
            'berkas.*' => 'file|mimes:pdf|max:2048',
        ]);


        $pengajuan = Pengajuan::where('nim', auth('user')->user()->nim)
            ->where('layanan', $layanan)
            ->first();

        if ($pengajuan && !$pengajuan->ditolak) {
            return redirect()->back()->with('error', 'Anda telah mengajukan layanan ini sebelumnya dan sedang dalam proses. Silakan tunggu hingga proses selesai.');
        }

        if ($pengajuan && $pengajuan->ditolak) {
            foreach ($pengajuan->berkas as $berkas) {
                $this->deleteFile($berkas->file, 'files/pengajuan/' . $layanan);

                $berkas->delete();
            }

            $pengajuan->delete();
        }

        $daftarBerkas = PersyaratanBerkas::where('layanan', $layanan)->get();

        if ($daftarBerkas->count() != count($request->berkas)) {
            return redirect()->back()->with('error', 'Jumlah berkas tidak sesuai.');
        }

        $user = auth('user')->user();

        $pengajuan = Pengajuan::create([
            'layanan' => $layanan,
            'nim' => $user->nim,
            'nama' => $user->nama,
            'angkatan' => $user->angkatan,
            'prodi' => $user->prodi->nama,
            'no_telp' => $user->no_telp,
        ]);

        foreach ($daftarBerkas as $berkas) {
            $file = $request->berkas[$berkas->id];

            $filename = $this->uploadFile($file, 'files/pengajuan/' . $layanan);
            // $filename = $this->uploadFile($file, 'files/pengajuan/' . $layanan, $berkas->nama);

            PengajuanBerkas::create([
                'pengajuan_id' => $pengajuan->id,
                'berkas' => $berkas->nama,
                'file' => $filename,
            ]);
        }

        event(new PengajuanTerkirim($pengajuan));

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim.');
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
            abort(404, 'Surat tidak ditemukan');
        }

        return pdf($layanan['pdf'][$jenis], [
            'layanan' => $layanan,
            'pengajuan' => $pengajuan,
            'surat' => $surat,
            'ttd' => $ttd,
        ]);
    }
}
