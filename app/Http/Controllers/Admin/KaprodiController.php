<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kaprodi;
use App\Models\Prodi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Repositories\KaprodiRepository;

class KaprodiController extends Controller
{
    protected $kaprodiRepository;

    /**
     * KaprodiController constructor.
     *
     * @param KaprodiRepository $kaprodiRepository
     */
    public function __construct(KaprodiRepository $kaprodiRepository)
    {
        $this->kaprodiRepository = $kaprodiRepository;
    }

    /**
     * Menampilkan halaman index kaprodi
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.kaprodi', [
            'users' => $this->kaprodiRepository->getAll(),
            'prodis' => Prodi::all(),
        ]);
    }

    /**
     * Menyimpan kaprodi baru
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nuptk' => ['required', 'unique:kaprodi,nuptk'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:kaprodi,email'],
            'password' => ['required', 'confirmed'],
            'prodi_id' => ['required', 'exists:prodi,id', 'unique:kaprodi,prodi_id'],
        ]);

        $this->kaprodiRepository->create($data);

        return back()->with('success', 'Berhasil menambahkan kaprodi!');
    }

    /**
     * Menampilkan halaman edit kaprodi
     *
     * @param Kaprodi $kaprodi
     * @return View
     */
    public function edit(Kaprodi $kaprodi): View
    {
        return view('admin.kaprodi-edit', [
            'user' => $kaprodi,
            'prodis' => Prodi::all(),
        ]);
    }

    /**
     * Mengupdate kaprodi
     *
     * @param Request $request
     * @param Kaprodi $kaprodi
     * @return RedirectResponse
     */
    public function update(Request $request, Kaprodi $kaprodi): RedirectResponse
    {
        $data = $request->validate([
            'nuptk' => [
                'required',
                'unique:kaprodi,nuptk,' . $kaprodi->id,
            ],
            'nama' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:kaprodi,email,' . $kaprodi->id,
            ],
            'password' => [
                'nullable',
                'confirmed',
            ],
            'prodi_id' => [
                'required',
                'exists:prodi,id',
                'unique:kaprodi,prodi_id,' . $kaprodi->id,
            ],
        ]);

        $this->kaprodiRepository->update($kaprodi->id, $data);

        return back()->with('success', 'Berhasil mengubah kaprodi!');
    }

    /**
     * Menghapus kaprodi
     *
     * @param Kaprodi $kaprodi
     * @return RedirectResponse
     */
    public function destroy(Kaprodi $kaprodi): RedirectResponse
    {
        $kaprodi->delete();

        return back()->with('success', 'Berhasil menghapus kaprodi!');
    }
}
