<?php

namespace App\Http\Controllers\WakilDekan;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\PengumumanRepository;

class PengumumanController extends Controller
{
    protected $pengumumanRepository;

    /**
     * Membuat instance baru dari PengumumanController
     *
     * @param PengumumanRepository $pengumumanRepository
     */
    public function __construct(PengumumanRepository $pengumumanRepository)
    {
        $this->pengumumanRepository = $pengumumanRepository;
    }

    /**
     * Menampilkan halaman pengumuman
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->has('id')) {
            $data = [
                'pengumuman' => $this->pengumumanRepository->getById($request->id)
            ];

            return view('dekan.pengumuman-edit', $data);
        }

        return view('dekan.pengumuman', [
            'daftarPengumuman' => $this->pengumumanRepository->getPaginated(4)
        ]);
    }

    /**
     * Menyimpan pengumuman ke database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required'],
            'konten' => ['required'],
        ]);

        $data['penulis'] = auth('dekan')->user()->jabatan == 'dekan' ? 'Dekan' : 'Wakil Dekan';

        $this->pengumumanRepository->create($data);

        return back()->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    /**
     * Mengubah pengumuman yang sudah ada
     *
     * @param Request $request
     * @param Pengumuman $pengumuman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $data = $request->validate([
            'judul' => ['required'],
            'konten' => ['required'],
        ]);

        $this->pengumumanRepository->update($pengumuman->id, $data);

        return to_route('dekan.pengumuman')->with('success', 'Pengumuman berhasil diubah.');
    }

    /**
     * Menghapus pengumuman
     *
     * @param Pengumuman $pengumuman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $this->pengumumanRepository->delete($pengumuman->id);

        return back()->with('success', 'Pengumuman berhasil dihapus.');
    }
}
