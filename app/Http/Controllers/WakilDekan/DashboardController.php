<?php

namespace App\Http\Controllers\WakilDekan;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Pengumuman;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard wakil dekan
     *
     * @return View
     */
    public function index(): View
    {
        return view('wakil-dekan.dashboard', [
            'totalMahasiswa' => User::count(),
            'totalPengumuman' => Pengumuman::count(),
            'daftarProdi' => Prodi::all(),
            'pengumumanTerbaru' => Pengumuman::latest()->limit(5)->get()
        ]);
    }
}
