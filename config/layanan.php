<?php

return [
  'aktif-kuliah' => [
    'label' => 'Surat Keterangan Aktif Kuliah',
    'deskripsi' => 'Surat Keterangan Aktif Kuliah',
    'tipe' => 'aktif-kuliah',
    'view' => 'aktif-kuliah',
    'fields' => [
      [
          'name' => 'semester',
          'label' => 'Semester',
          'type' => 'select',
          'required' => true,
          'options' => [
              1 => 'Semester 1',
              2 => 'Semester 2',
              3 => 'Semester 3',
              4 => 'Semester 4',
              5 => 'Semester 5',
              6 => 'Semester 6',
              7 => 'Semester 7',
              8 => 'Semester 8',
          ],
      ],
      [
          'name' => 'alamat',
          'label' => 'Alamat',
          'type' => 'textarea',
          'required' => true,
      ],
      [
          'name' => 'namaortu',
          'label' => 'Nama Orang Tua/Wali',
          'type' => 'text',
          'required' => true,
      ],
      [
          'name' => 'nip',
          'label' => 'NIP / NRP',
          'type' => 'text',
          'required' => false,
      ],
      [
          'name' => 'pangkatgolongan',
          'label' => 'Pangkat / Golongan',
          'type' => 'text',
          'required' => true,
      ],
      [
          'name' => 'instansi',
          'label' => 'Instansi',
          'type' => 'text',
          'required' => true,
      ],
      [
          'name' => 'jabatan',
          'label' => 'Jabatan',
          'type' => 'text',
          'required' => true,
      ],
    ],
    'persyaratan' => [
      'Slip Pembayaran Aktif Kuliah',
      'KRS Semester Berjalan',
    ],
    'keterangan' => [
      'Slip Pembayaran Keterangan Kuliah dari Smart Campus',
      null,
    ],
    'pdf' => [
      'surat' => 'pdf.aktif-kuliah',
    ]
  ],
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
  'pembimbing-kpi' => [
    'label' => 'Pembimbing KPI',
    'deskripsi' => 'Pengajuan Pembimbing KPI',
    'tipe' => 'pembimbing-kpi',
    'view' => 'pembimbing-kpi',
    'persyaratan' => [
      'Pengusulan dari Prodi',
      'KRS Semester Berjalan',
      'DNS',
      'Balasan KPI dari Instansi',
    ],
    'pdf' => [
        'surat' => 'pdf.pembimbing-kpi',
    ],
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
      // 'undangan' => 'pdf.kpi-undangan',
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
    'keterangan' => [
      null,
      null,
      null,
      null,
      'Minimal 120 SKS dilulus di DNS, nilai KPI dan KKN sudah masuk di DNS',
      'Lembar pengesahan yang dintandatangani oleh pembimbing 1 & 2, Kaprodi Dan WD1',
      null,
    ],
    'pdf' => [
      'surat' => 'pdf.proposal-seminar',
      'undangan' => 'pdf.proposal-undangan',
    ]
  ],
  'izin-penelitian' => [
    'label' => 'Izin Penelitian',
    'deskripsi' => 'Pengajuan Surat Izin Penelitian',
    'tipe' => 'izin-penelitian',
    'view' => 'izin-penelitian',
    'fields' => [
      [
          'name' => 'tujuan_penelitian',
          'label' => 'Tujuan Surat / Nama Tempat Penelitian',
          'type' => 'text',
          'required' => true,
      ],
      [
          'name' => 'alamat_penelitian',
          'label' => 'Alamat Tempat Penelitian',
          'type' => 'textarea',
          'required' => true,
      ],
    ],
    'persyaratan' => [
        'Berita Acara Seminar Proposal',
    ],
    'pdf' => [
        'surat' => 'pdf.izin-penelitian',
    ],
],
  'seminar-hasil' => [
    'label' => 'Seminar Hasil',
    'deskripsi' => 'Pengajuan Seminar Hasil',
    'tipe' => 'seminar-ta',
    'view' => 'seminar-hasil',
    'persyaratan' => [
      'Usulan Jadwal Hasil',
      'Notulen Seminar Proposal',
      'Berita Acara Proposal',
      'Bukti Pelunasan Hasil',
      'Bukti Surat Keterangan Penelitian',
      'Lembar Asistensi Bimbingan',
      'DNS',
      'Lembar Pengesahan',
      'KRS Semester Berjalan',
    ],
    'keterangan' => [
      'Usulan jadwal hasil dibuat oleh mahasiswa',
      'Notulen Seminar Proposal yang sudah di acc oleh penguji',
      'Berita Acara Seminar Proposal yang sudah ditanda tangani oleh semua pembimbing dan penguji',
      null,
      null,
      'Nilai DNS sudah masuk nilai proposal (Tidak termasuk nilai hasil dan tutup)',
      'Lembar Pengesahan yang sudah ditanda tangani oleh Pembimbing, Kaprodi, Dekan',
      null,
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
      'Usulan Jadwal Tutup',
      'Lembar Asistensi Bimbingan',
      'Berita Acara Hasil',
      'Notulen Seminar Hasil',
      'Bukti Pelunasan Tutup',
      'DNS',
      'Lembar Pengesahan',
      'KRS Semester Berjalan',
    ],
    'keterangan' => [
      'Pada bagian ini, perlu dibicarakan dulu dengan fakultas',
      'Usulan jadwal tutup dibuat oleh mahasiswa',
      'Lembar asisten bimbingan ditanda tangani oleh semua pembimbing',
      'Berita acara hasil sudah ditanda tangani oleh semua pembimbing dan penguji',
      'Notulen hasil sudah diacc oleh semua penguji',
      'Bukti pelunasan Pembayaran ujian tutup',
      'Nilai proposal, hasil, sudah masuk didalam DNS',
      'Lembar pengesahan pembimbing sudah dittd oleh semua pembimbing, kaprodi, dekan',
      null,
    ],
    'pdf' => [
      'surat' => 'pdf.tutup-seminar',
      'undangan' => 'pdf.tutup-undangan',
    ]
  ],
  'keterangan-lulus' => [
    'label' => 'Keterangan Lulus',
    'deskripsi' => 'Surat Keterangan Lulus',
    'tipe' => 'keterangan-lulus',
    'view' => 'keterangan-lulus',
    'persyaratan' => [
      'Slip Pembayaran SKL',
      'Penyerahan Skripsi',
      'SK Yudis',
      'DNS',
    ],
    'keterangan' => [
      'Slip pembayaran surat keterangan lulus dari smart campus',
      null,
      null,
      null,
    ],
    'pdf' => [
      'surat' => 'pdf.keterangan-lulus',
    ]
  ],
  'keabsahan-data' => [
    'label' => 'Keterangan Keabsahan Data',
    'deskripsi' => 'Surat Keterangan Keabsahan Data',
    'tipe' => 'keabsahan-data',
    'view' => 'keabsahan-data',
    'persyaratan' => [
      'KTP',
      'KK',
      'Akte Lahir',
      'Foto Data yang salah dari PDDKTI',
      'Data yang Benar',
    ],
    'pdf' => [
      'surat' => 'pdf.keabsahan-data',
    ]
  ],
];
