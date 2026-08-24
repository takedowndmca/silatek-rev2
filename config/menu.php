<?php

return [
  'admin' => [
    [
      'active' => 'dashboard',
      'label' => 'Dashboard',
      'route' => 'admin.dashboard',
      'route_params' => [],
      'icon' => 'home',
    ],
    [
      'active' => 'prodi',
      'label' => 'Program Studi',
      'route' => 'admin.prodi',
      'route_params' => [],
      'icon' => 'building',
    ],
    [
      'active' => 'pengumuman',
      'label' => 'Pengumuman',
      'route' => 'admin.pengumuman',
      'route_params' => [],
      'icon' => 'newspaper',
    ],
    [
      'active' => 'manajemen-akun',
      'label' => 'Manajemen Akun',
      'icon' => 'users',
      'submenu' => [
        [
          'active' => 'dekan',
          'label' => 'Dekan',
          'route' => 'admin.dekan',
          'route_params' => [],
        ],
        [
          'active' => 'staf',
          'label' => 'Staf TU',
          'route' => 'admin.staf',
          'route_params' => [],
        ],
        [
          'active' => 'mahasiswa',
          'label' => 'Mahasiswa',
          'route' => 'admin.mahasiswa',
          'route_params' => [],
        ],
      ],
    ],
  ],
  'dekan' => [
    [
      'active' => 'dashboard',
      'label' => 'Dashboard',
      'route' => 'dekan.dashboard',
      'route_params' => [],
      'icon' => 'home',
    ],
    [
      'active' => 'pengumuman',
      'label' => 'Pengumuman',
      'route' => 'dekan.pengumuman',
      'route_params' => [],
      'icon' => 'newspaper',
    ],
    [
      'active' => 'mahasiswa',
      'label' => 'Mahasiswa',
      'route' => 'dekan.mahasiswa',
      'route_params' => [],
      'icon' => 'user',
    ],
    [
      'active' => 'surat',
      'label' => 'Surat Pengajuan',
      'icon' => 'file',
      'submenu' => [
        [
          'active' => 'pengusulan-tempat-kpi',
          'label' => 'Pengusulan Tempat KPI',
          'route' => 'dekan.surat',
          'route_params' => ['layanan' => 'pengusulan-tempat-kpi'],
        ],
        [
          'active' => 'seminar-kpi',
          'label' => 'Seminar KPI',
          'route' => 'dekan.surat',
          'route_params' => ['layanan' => 'seminar-kpi'],
        ],
        [
          'active' => 'bebas-matakuliah',
          'label' => 'Bebas Mata Kuliah',
          'route' => 'dekan.surat',
          'route_params' => ['layanan' => 'bebas-matakuliah'],
        ],
        [
          'active' => 'pembimbing-ta',
          'label' => 'Pembimbing TA',
          'route' => 'dekan.surat',
          'route_params' => ['layanan' => 'pembimbing-ta'],
        ],
        [
          'active' => 'seminar-proposal',
          'label' => 'Seminar Proposal',
          'route' => 'dekan.surat',
          'route_params' => ['layanan' => 'seminar-proposal'],
        ],
        [
          'active' => 'seminar-hasil',
          'label' => 'Seminar Hasil',
          'route' => 'dekan.surat',
          'route_params' => ['layanan' => 'seminar-hasil'],
        ],
        [
          'active' => 'seminar-tutup',
          'label' => 'Seminar Tutup',
          'route' => 'dekan.surat',
          'route_params' => ['layanan' => 'seminar-tutup'],
        ],
      ]
    ],
  ],
  'wakil_dekan' => [
    [
      'active' => 'dashboard',
      'label' => 'Dashboard',
      'route' => 'wakil_dekan.dashboard',
      'route_params' => [],
      'icon' => 'home',
    ],
    [
      'active' => 'pengumuman',
      'label' => 'Pengumuman',
      'route' => 'wakil_dekan.pengumuman',
      'route_params' => [],
      'icon' => 'newspaper',
    ],
    [
      'active' => 'mahasiswa',
      'label' => 'Mahasiswa',
      'route' => 'wakil_dekan.mahasiswa',
      'route_params' => [],
      'icon' => 'user',
    ],
    [
      'active' => 'surat',
      'label' => 'Surat Pengajuan',
      'icon' => 'file',
      'submenu' => [
        [
          'active' => 'pengusulan-tempat-kpi',
          'label' => 'Pengusulan Tempat KPI',
          'route' => 'wakil_dekan.surat',
          'route_params' => ['layanan' => 'pengusulan-tempat-kpi'],
        ],
        [
          'active' => 'seminar-kpi',
          'label' => 'Seminar KPI',
          'route' => 'wakil_dekan.surat',
          'route_params' => ['layanan' => 'seminar-kpi'],
        ],
        [
          'active' => 'bebas-matakuliah',
          'label' => 'Bebas Mata Kuliah',
          'route' => 'wakil_dekan.surat',
          'route_params' => ['layanan' => 'bebas-matakuliah'],
        ],
        [
          'active' => 'pembimbing-ta',
          'label' => 'Pembimbing TA',
          'route' => 'wakil_dekan.surat',
          'route_params' => ['layanan' => 'pembimbing-ta'],
        ],
        [
          'active' => 'seminar-proposal',
          'label' => 'Seminar Proposal',
          'route' => 'wakil_dekan.surat',
          'route_params' => ['layanan' => 'seminar-proposal'],
        ],
        [
          'active' => 'seminar-hasil',
          'label' => 'Seminar Hasil',
          'route' => 'wakil_dekan.surat',
          'route_params' => ['layanan' => 'seminar-hasil'],
        ],
        [
          'active' => 'seminar-tutup',
          'label' => 'Seminar Tutup',
          'route' => 'wakil_dekan.surat',
          'route_params' => ['layanan' => 'seminar-tutup'],
        ],
      ]
    ],
  ],
  'staf' => [
    [
      'active' => 'dashboard',
      'label' => 'Dashboard',
      'route' => 'staf.dashboard',
      'route_params' => [],
      'icon' => 'home',
    ],
    [
      'active' => 'pengumuman',
      'label' => 'Pengumuman',
      'route' => 'staf.pengumuman',
      'route_params' => [],
      'icon' => 'newspaper',
    ],
    [
      'active' => 'mahasiswa',
      'label' => 'Mahasiswa',
      'route' => 'staf.mahasiswa',
      'route_params' => [],
      'icon' => 'user',
    ],
    [
      'active' => 'layanan',
      'label' => 'Layanan Akademik',
      'icon' => 'book-open',
      'submenu' => [
        [
          'active' => 'pengusulan-tempat-kpi',
          'label' => 'Pengusulan Tempat KPI',
          'route' => 'staf.layanan',
          'route_params' => ['layanan' => 'pengusulan-tempat-kpi'],
        ],
        [
          'active' => 'seminar-kpi',
          'label' => 'Seminar KPI',
          'route' => 'staf.layanan',
          'route_params' => ['layanan' => 'seminar-kpi'],
        ],
        [
          'active' => 'bebas-matakuliah',
          'label' => 'Bebas Mata Kuliah',
          'route' => 'staf.layanan',
          'route_params' => ['layanan' => 'bebas-matakuliah'],
        ],
        [
          'active' => 'pembimbing-ta',
          'label' => 'Pembimbing TA',
          'route' => 'staf.layanan',
          'route_params' => ['layanan' => 'pembimbing-ta'],
        ],
        [
          'active' => 'seminar-proposal',
          'label' => 'Seminar Proposal',
          'route' => 'staf.layanan',
          'route_params' => ['layanan' => 'seminar-proposal'],
        ],
        [
          'active' => 'seminar-hasil',
          'label' => 'Seminar Hasil',
          'route' => 'staf.layanan',
          'route_params' => ['layanan' => 'seminar-hasil'],
        ],
        [
          'active' => 'seminar-tutup',
          'label' => 'Seminar Tutup',
          'route' => 'staf.layanan',
          'route_params' => ['layanan' => 'seminar-tutup'],
        ],
      ]
    ],
    [
      'active' => 'surat',
      'label' => 'Surat Pengajuan',
      'icon' => 'file',
      'submenu' => [
        [
          'active' => 'pengusulan-tempat-kpi',
          'label' => 'Pengusulan Tempat KPI',
          'route' => 'staf.surat',
          'route_params' => ['layanan' => 'pengusulan-tempat-kpi'],
        ],
        [
          'active' => 'seminar-kpi',
          'label' => 'Seminar KPI',
          'route' => 'staf.surat',
          'route_params' => ['layanan' => 'seminar-kpi'],
        ],
        [
          'active' => 'bebas-matakuliah',
          'label' => 'Bebas Mata Kuliah',
          'route' => 'staf.surat',
          'route_params' => ['layanan' => 'bebas-matakuliah'],
        ],
        [
          'active' => 'pembimbing-ta',
          'label' => 'Pembimbing TA',
          'route' => 'staf.surat',
          'route_params' => ['layanan' => 'pembimbing-ta'],
        ],
        [
          'active' => 'seminar-proposal',
          'label' => 'Seminar Proposal',
          'route' => 'staf.surat',
          'route_params' => ['layanan' => 'seminar-proposal'],
        ],
        [
          'active' => 'seminar-hasil',
          'label' => 'Seminar Hasil',
          'route' => 'staf.surat',
          'route_params' => ['layanan' => 'seminar-hasil'],
        ],
        [
          'active' => 'seminar-tutup',
          'label' => 'Seminar Tutup',
          'route' => 'staf.surat',
          'route_params' => ['layanan' => 'seminar-tutup'],
        ],
      ]
    ],
  ],
];
