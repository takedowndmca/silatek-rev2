<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Http\Repositories\KaprodiRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    protected $kaprodiRepository;

    public function __construct(KaprodiRepository $kaprodiRepository)
    {
        $this->kaprodiRepository = $kaprodiRepository;
    }

    /**
     * Menampilkan halaman akun kaprodi
     *
     * @return View
     */
    public function index(): View
    {
        return view('kaprodi.account', [
            'user' => $this->kaprodiRepository->getById(auth('kaprodi')->user()->id),
        ]);
    }

    /**
     * Mengupdate data akun kaprodi
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateAccount(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nuptk' => ['required', 'unique:kaprodi,nuptk,' . auth('kaprodi')->user()->id],
            'nama' => ['required'],
            'email' => ['required', 'email', 'unique:kaprodi,email,' . auth('kaprodi')->user()->id],
        ]);

        $this->kaprodiRepository->update(auth('kaprodi')->user()->id, $data);

        return redirect()->back()->with('success', __('strings.profile_updated'));
    }

    /**
     * Mengupdate password akun kaprodi
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        if (!auth('kaprodi')->user()->checkPassword($data['old_password'])) {
            return redirect()->back()->with('error', __('passwords.old_password_incorrect'));
        }

        $this->kaprodiRepository->update(auth('kaprodi')->user()->id, $data);

        return redirect()->back()->with('success', __('passwords.updated'));
    }
}
