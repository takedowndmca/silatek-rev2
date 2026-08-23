<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dekan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Repositories\DekanRepository;

class DekanController extends Controller
{
    protected $dekanRepository;

    /**
     * DekanController constructor.
     *
     * @param DekanRepository $dekanRepository
     */
    public function __construct(DekanRepository $dekanRepository)
    {
        $this->dekanRepository = $dekanRepository;
    }

    /**
     * Menampilkan halaman index dekan
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.dekan', [
            'users' => $this->dekanRepository->getAll(),
        ]);
    }

    /**
     * Menyimpan dekan baru
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nuptk' => ['required', 'unique:dekan,nuptk'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:dekan'],
            'password' => ['required', 'confirmed'],
            'jabatan' => ['required', 'in:dekan,wakil_dekan'],
        ]);

        $this->dekanRepository->create($data);

        return back()->with('success', 'Berhasil menambahkan dekan!');
    }

    /**
     * Menampilkan halaman edit dekan
     *
     * @param Dekan $dekan
     * @return View
     */
    public function edit(Dekan $dekan): View
    {
        return view('admin.dekan-edit', [
            'user' => $dekan,
        ]);
    }

    /**
     * Mengupdate dekan
     *
     * @param Request $request
     * @param Dekan $dekan
     * @return RedirectResponse
     */
    public function update(Request $request, Dekan $dekan): RedirectResponse
    {
        $data = $request->validate([
            'nuptk' => ['required', 'unique:dekan,nuptk,' . $dekan->id],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:dekan,email,' . $dekan->id],
            'password' => ['nullable', 'confirmed'],
        ]);

        $this->dekanRepository->update($dekan->id, $data);

        return back()->with('success', 'Berhasil mengubah dekan!');
    }

    /**
     * Menghapus dekan
     *
     * @param Dekan $dekan
     * @return RedirectResponse
     */
    public function destroy(Dekan $dekan): RedirectResponse
    {
        $dekan->delete();

        return back()->with('success', 'Berhasil menghapus dekan!');
    }
}
