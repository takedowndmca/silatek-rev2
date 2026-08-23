<?php

namespace App\Http\Controllers\WakilDekan;

use App\Http\Controllers\Controller;
use App\Http\Repositories\DekanRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    protected $dekanRepository;

    public function __construct(DekanRepository $dekanRepository)
    {
        $this->dekanRepository = $dekanRepository;
    }

    /**
     * Menampilkan halaman akun dekan
     *
     * @return View
     */
    public function index(): View
    {
        return view('dekan.account', [
            'user' => $this->dekanRepository->getById(auth('dekan')->user()->id),
        ]);
    }

    /**
     * Mengupdate data akun dekan
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateAccount(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nuptk' => ['required', 'unique:dekan,nuptk,' . auth('dekan')->user()->id],
            'nama' => ['required'],
            'email' => ['required', 'email', 'unique:dekan,email,' . auth('dekan')->user()->id],
        ]);

        $this->dekanRepository->update(auth('dekan')->user()->id, $data);

        return redirect()->back()->with('success', __('strings.profile_updated'));
    }

    /**
     * Mengupdate password akun dekan
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

        if (!auth('dekan')->user()->checkPassword($data['old_password'])) {
            return redirect()->back()->with('error', __('passwords.old_password_incorrect'));
        }

        $this->dekanRepository->update(auth('dekan')->user()->id, $data);

        return redirect()->back()->with('success', __('passwords.updated'));
    }
}
