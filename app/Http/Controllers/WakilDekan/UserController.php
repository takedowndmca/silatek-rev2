<?php

namespace App\Http\Controllers\WakilDekan;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\ProdiRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    protected $userRepository;
    protected $prodiRepository;

    public function __construct(UserRepository $userRepository, ProdiRepository $prodiRepository)
    {
        $this->userRepository = $userRepository;
        $this->prodiRepository = $prodiRepository;
    }

    /**
     * Menampilkan halaman daftar mahasiswa
     * 
     * @return View
     */
    public function index(): View
    {
        return view('dekan.mahasiswa', [
            'users' => $this->userRepository->getAll(),
            'daftarProdi' => $this->prodiRepository->getAll(),
        ]);
    }

    /**
     * Menyimpan data mahasiswa yang baru
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nim' => ['required', 'string', 'max:255', 'unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'prodi_id' => ['required', 'exists:prodi,id'],
            'no_telp' => ['required', 'string', 'max:255'],
            'angkatan' => ['required', 'string', 'max:255'],
        ]);

        $this->userRepository->create($data);

        return back()->with('success', 'Berhasil menambahkan mahasiswa!');
    }

    /**
     * Menampilkan halaman edit mahasiswa
     * 
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('dekan.mahasiswa-edit', [
            'user' => $user,
            'daftarProdi' => $this->prodiRepository->getAll(),
        ]);
    }

    /**
     * Mengubah data mahasiswa
     * 
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'nim' => ['required', 'string', 'max:255', 'unique:users,nim,' . $user->id],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed'],
            'prodi_id' => ['required', 'exists:prodi,id'],
            'no_telp' => ['required', 'string', 'max:255'],
            'angkatan' => ['required', 'string', 'max:255'],
        ]);

        $this->userRepository->update($user->id, $data);

        return back()->with('success', 'Berhasil mengubah data mahasiswa!');
    }

    /**
     * Menghapus data mahasiswa
     * 
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return back()->with('success', 'Berhasil menghapus data mahasiswa!');
    }
}
