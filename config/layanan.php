<?php

return [
  'pengusulan-tempat-kpi' => [
    'label' => 'Pengusulan Tempat KPI',
    'deskripsi' => 'Pengusulan Tempat KPI',
    'tipe' => 'pengusulan-tempat-kpi',
    'view' => 'pengusulan-tempat-kpi',
    'persyaratan' => [
      'Pengusulan dari Prodi',
      'KRS Semester Berjalan',
      'DNS',
    ],
    'pdf' => [
      'surat' => 'pdf.pengusulan-tempat-kpi',
    ]
  ],
  'seminar-kpi' => [
    'label' => 'Seminar KPI',
    'deskripsi' => 'Pengajuan Seminar KPI',
    'tipe' => 'seminar-kpi',
    'view' => 'seminar-kpi',
    'persyaratan' => [
      'Pengusulan Seminar dari Prodi',
      'KRS Semester Berjalan',
      'DNS',
      'Balasan KPI dari Instansi',
      'Lembar Pengesahan Pembimbing',
      'Lembar Persetujuan KPI',
    ],
    'pdf' => [
      'surat' => 'pdf.kpi-seminar',
    ]
  ],
  'pembimbing-ta' => [
    'label' => 'Pembimbing TA',
    'deskripsi' => 'Pengajuan Pembimbing TA',
    'tipe' => 'pembimbing-ta',
    'view' => 'pembimbing-ta',
    'persyaratan' => [
      'Pengusulan Pembimbing dari Prodi',
      'KRS Semester Berjalan',
      'DNS',
    ],
    'pdf' => [
      'surat' => 'pdf.pembimbing-ta',
    ]
  ],
  'seminar-proposal' => [
    'label' => 'Seminar Proposal',
    'deskripsi' => 'Pengajuan Seminar Proposal',
    'tipe' => 'seminar-ta',
    'view' => 'seminar-proposal',
    'persyaratan' => [
      'Usulan Jadwal dari Prodi',
      'Lembar Asistensi Bimbingan',
      'Bukti Pelunasan Proposal',
      'Pengusulan dari Prodi',
      'DNS',
      'Lembar Pengesahan',
      'KRS Semester Berjalan',
    ],
    'pdf' => [
      'surat' => 'pdf.proposal-seminar',
      'undangan' => 'pdf.proposal-undangan',
    ]
  ],
  'seminar-hasil' => [
    'label' => 'Seminar Hasil',
    'deskripsi' => 'Pengajuan Seminar Hasil',
    'tipe' => 'seminar-ta',
    'view' => 'seminar-hasil',
    'persyaratan' => [
      'Usulan Jadwal Hasil dari Prodi',
      'Notulen Seminar Proposal',
      'Berita Acara Proposal',
      'Bukti Pelunasan Hasil',
      'Bukti Surat Keterangan Penelitian',
      'Lembar Asistensi Bimbingan',
      'DNS',
      'Lembar Pengesahan',
      'KRS Semester Berjalan',
    ],
    'pdf' => [
      'surat' => 'pdf.hasil-seminar',
      'undangan' => 'pdf.hasil-undangan',
    ]
  ],
  'bebas-matakuliah' => [
    'label' => 'Bebas Mata Kuliah',
    'deskripsi' => 'Pengajuan Bebas Mata Kuliah',
    'tipe' => 'administrasi',
    'view' => 'bebas-matakuliah',
    'persyaratan' => [
      'DNS',
      'Tabulasi Nilai',
      'KRS Semester Berjalan',
      'Fotocopy Surat Keterangan Bebas Keuangan UIM',
    ],
    'pdf' => [
      'surat' => 'pdf.bebas-matakuliah',
    ]
  ],
  'seminar-tutup' => [
    'label' => 'Seminar Tutup',
    'deskripsi' => 'Pengajuan Seminar Tutup',
    'tipe' => 'seminar-ta',
    'view' => 'seminar-tutup',
    'persyaratan' => [
      'Berkas Kelengkapan Tutup',
      'Usulan Jadwal Tutup dari Prodi',
      'Lembar Asistensi Bimbingan',
      'Berita Acara Hasil',
      'Notulen Seminar Hasil',
      'Bukti Pelunasan Tutup',
      'DNS',
      'Lembar Pengesahan',
      'KRS Semester Berjalan',
    ],
    'pdf' => [
      'surat' => 'pdf.tutup-seminar',
      'undangan' => 'pdf.tutup-undangan',
    ]
  ],
];
