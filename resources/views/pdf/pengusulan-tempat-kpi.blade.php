<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Surat {{ $layanan['label'] }}</title>

    <style>
        * {
            font-family: Arial, sans-serif;
            font-size: 11pt;
        }

        body {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
            font-size: 10pt;
            text-align: justify;
            line-height: 1.35;
        }

        b,
        strong,
        u {
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        table {
            border-spacing: 0;
            border: 0;
            width: 100%;
        }

        table td {
            vertical-align: top;
            padding: 0;
            border: 0;
            font-size: 10pt;
            line-height: 1.35;
        }

        .center {
            text-align: center;
        }

        .salam {
            font-weight: bold;
            font-style: italic;
            margin-bottom: 8pt;
        }

        .arabic {
            font-weight: bold;
            font-style: italic;
            margin-top: 12pt;
        }

        .judul {
            text-align: center;
            margin-bottom: 12pt;
        }

        .judul p {
            text-align: center;
        }

        .list-mahasiswa td {
            padding: 0;
        }

        .ttd {
            font-weight: bold;
            text-decoration: underline;
        }

        .qr {
            padding: 0 46pt;
        }

        .tembusan {
            margin-top: 10pt;
        }

        .tembusan * {
            margin: 0;
            font-size: 8pt;
        }

        .tembusan ol {
            padding-left: 20pt;
        }

        .mb {
            margin-bottom: 10pt;
        }
    </style>
</head>

<body>

    {{-- =====================================================
         KOP SURAT
         ===================================================== --}}
    <img src="{{ public_path('assets/images/kop_fakultas.png') }}" alt=""
        style="width: 100%; height: auto; margin-bottom: 10pt;">


    {{-- =====================================================
         NOMOR DAN TANGGAL
         ===================================================== --}}
    <table style="margin-bottom: 10pt;">
        <tr>
            <td style="width: 55pt;">Nomor</td>
            <td style="width: 10pt;" class="center">:</td>
            <td>
                {{ $surat->nomor ?? $surat->nomor_sk }}
            </td>

            <td style="text-align: right;">
                {{ tanggalHijri($surat->tanggal_surat) }} H
            </td>
        </tr>

        <tr>
            <td>Lampiran</td>
            <td class="center">:</td>
            <td>
                {{ $surat->lampiran ?? '-' }}
            </td>

            <td style="text-align: right;">
                {{ tanggal($surat->tanggal_surat) }} M
            </td>
        </tr>

        <tr>
            <td>Perihal</td>
            <td class="center">:</td>
            <td colspan="2">
                <b>Permohonan KPI</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="center"></td>
            <td colspan="2">
                <b>Fakultas Teknik Universitas Islam Makassar</b>
            </td>
        </tr>
    </table>


    {{-- =====================================================
         TUJUAN SURAT
         ===================================================== --}}
    <p style="margin-bottom: 2pt;">
        Kepada Yth.
    </p>

    <p style="font-weight: bold;">
        Kepala {{ $surat->tujuan_instansi ?? 'Badan Pusat Statistik Provinsi Sulawesi Selatan' }}
    </p>

    <p style="margin-bottom: 10pt;">
        Di -
        <br>
        {{ $surat->alamat_tujuan ?? 'Jl. H. Bau No. 6 Kunjung Mae Kec. Mariso Kota Makassar, Sul-Sel' }}
    </p>


    {{-- =====================================================
         SALAM
         ===================================================== --}}
    <p class="salam">
        Bismillahirrahmanirrahim
    </p>

    <p class="salam">
        Assalamu'alaikum Warahmatullahi Wabarakatuh
    </p>


    {{-- =====================================================
         ISI SURAT
         ===================================================== --}}
    <p style="margin-bottom: 8pt;">
        Salam silaturahmi kami ucapkan, semoga segala aktivitas keseharian kita bernilai ibadah
        di sisi-Nya. Amin.
    </p>

    <p style="margin-bottom: 8pt;">
        Sehubungan dengan salah satu syarat yang harus dilaksanakan oleh mahasiswa Fakultas
        Teknik Universitas Islam Makassar yakni
        <b>Kerja Praktek Industri Selama 45 (Empat Puluh Lima) Hari Kerja</b>,
        maka kami memohon kepada Bapak/Ibu kiranya mahasiswa yang tersebut namanya di bawah ini
        dapat diterima pada perusahaan Bapak/Ibu:
    </p>


    {{-- =====================================================
         DATA MAHASISWA
         ===================================================== --}}

    @php

        /*
        |--------------------------------------------------------------------------
        | DATA MAHASISWA
        |--------------------------------------------------------------------------
        | Jika data mahasiswa disimpan sebagai text multiline:
        |
        | $surat->nama_mahasiswa
        |
        | contoh:
        | Adi Prasetya / 23.024.014.033
        | Rizwan Satriwana / 23.024.014.034
        | Rachmayana Usdi / 23.024.014.042
        |
        */

        $mahasiswa = [];

        if (!empty($surat->mahasiswa)) {
            $mahasiswa = is_array($surat->mahasiswa)
                ? $surat->mahasiswa
                : preg_split('/\r\n|\r|\n/', $surat->mahasiswa);
        }

    @endphp


    <table class="list-mahasiswa" style="margin-bottom: 8pt;">

        @if (count($mahasiswa) > 0)

            @foreach ($mahasiswa as $i => $mhs)
                @if (is_array($mhs))
                    <tr>
                        <td style="width: 55pt;">
                            {{ $i == 0 ? 'Nama / Nim' : '' }}
                        </td>

                        <td style="width: 10pt;" class="center">
                            {{ $i == 0 ? ':' : '' }}
                        </td>

                        <td>
                            {{ $mhs['nama'] ?? '' }}
                            /
                            {{ $mhs['nim'] ?? '' }}
                        </td>
                    </tr>
                @else
                    <tr>
                        <td style="width: 55pt;">
                            {{ $i == 0 ? 'Nama / Nim' : '' }}
                        </td>

                        <td style="width: 10pt;" class="center">
                            {{ $i == 0 ? ':' : '' }}
                        </td>

                        <td>
                            {{ trim($mhs) }}
                        </td>
                    </tr>
                @endif
            @endforeach
        @else
            {{-- DATA DEFAULT / JIKA BELUM ADA DATA MAHASISWA --}}

            <tr>
                <td style="width: 55pt;">Nama / Nim</td>
                <td style="width: 10pt;" class="center">:</td>
                <td>
                    Adi Prasetya / 23.024.014.033
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>
                    Rizwan Satriwana / 23.024.014.034
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>
                    Rachmayana Usdi / 23.024.014.042
                </td>
            </tr>

        @endif

        <tr>
            <td>Jurusan</td>
            <td class="center">:</td>
            <td>
                {{ $pengajuan->prodi ?? 'Teknik Informatika' }}
            </td>
        </tr>
        <tr>
            <td>Pembimbing</td>
            <td class="center">:</td>
            <td>
                {{ $surat->pembimbing ?? 'Ayu Lestari Perdana, S.Kom., M.Kom' }}
            </td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td class="center">:</td>
            <td>
                {{ $surat->waktu ?? '18 Agustus s/d 19 Oktober 2026' }}
            </td>
        </tr>
    </table>


    {{-- =====================================================
         PENUTUP
         ===================================================== --}}
    <p style="margin-bottom: 8pt;">
        Demikian permohonan ini kami buat, atas kerjasama Bapak/Ibu kami ucapkan terima kasih.
    </p>

    <p class="arabic">
        Wallahu Muaffiq Ilaa Aqwamith Tharieq
    </p>

    <p class="arabic" style="margin-bottom: 15pt;">
        Wassalamu'alaikum Wr Wb
    </p>


    {{-- =====================================================
         TANDA TANGAN
         ===================================================== --}}
    <table>
        <tr>

            <td style="width: 55%;"></td>

            <td style="width: 45%;">

                <p style="text-align: center;">
                    Wakil Dekan Fakultas Teknik UIM,
                </p>

                @if ($ttd)
                    <div style="text-align: center; margin-top: 5pt; margin-bottom: 2pt;">
                        <img src="data:image/png;base64, {{ $ttd }}" style="width: 100px; height: auto;">
                    </div>

                    <p class="ttd center">
                        {{ $surat->ttd->nama }}
                    </p>

                    <p class="center">
                        NUPTK. {{ $surat->ttd->nuptk }}
                    </p>
                @else
                    <div style="height: 80px;"></div>
                @endif
            </td>
        </tr>
    </table>


    {{-- =====================================================
         TEMBUSAN
         ===================================================== --}}
    <div class="tembusan">

        <span>
            Tembusan:
        </span>

        <ol>

            <li>Dekan Fakultas Teknik;</li>

            <li>Ketua Program Studi;</li>

            <li>Arsip.</li>

        </ol>
    </div>
</body>

</html>
