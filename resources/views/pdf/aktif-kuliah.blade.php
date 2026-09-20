<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Aktif Kuliah</title>

    <style>
        * {
            font-family: Arial, sans-serif;
            font-size: 10pt;
        }

        body {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
            line-height: 1.25;
            text-align: justify;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        td {
            padding: 0;
            vertical-align: top;
            line-height: 1.25;
        }

        .kop {
            width: 100%;
            height: auto;
            margin-bottom: 10pt;
        }

        .judul {
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            font-size: 11pt;
            margin-bottom: 8pt;
        }

        .nomor {
            margin-bottom: 10pt;
        }

        .label {
            width: 125pt;
        }

        .colon {
            width: 10pt;
            text-align: center;
        }

        .isi {
            width: auto;
        }

        .section {
            margin-bottom: 7pt;
        }

        .data-table {
            margin-top: 2pt;
            margin-bottom: 7pt;
        }

        .data-table .label {
            width: 125pt;
        }

        .data-table .colon {
            width: 10pt;
        }

        .bold {
            font-weight: bold;
        }

        .arabic {
            font-weight: bold;
            font-style: italic;
        }

        .ttd {
            text-decoration: underline;
            font-weight: bold;
        }

        .tembusan {
            margin-top: 10pt;
            font-size: 8pt;
        }

        .tembusan ol {
            margin-top: 2pt;
            padding-left: 18pt;
        }

        .tembusan li {
            font-size: 8pt;
            line-height: 1.2;
        }
    </style>
</head>

<body>

    {{-- =====================================================
         KOP SURAT
         ===================================================== --}}
    <img
        src="{{ public_path('assets/images/kop_fakultas.png') }}"
        class="kop"
        alt=""
    >


    {{-- =====================================================
         JUDUL
         ===================================================== --}}
    <p class="judul">
        SURAT KETERANGAN AKTIF KULIAH
    </p>


    {{-- =====================================================
         NOMOR
         ===================================================== --}}
    <table class="nomor">
        <tr>
            <td class="label">
                Nomor
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->nomor ?? '-' }}
            </td>
        </tr>
    </table>


    {{-- =====================================================
         DATA PEJABAT / YANG BERTANDA TANGAN
         ===================================================== --}}
    <p class="section">
        Yang bertanda tangan di bawah ini :
    </p>

    <table class="data-table">

        <tr>
            <td class="label">
                1. &nbsp;Nama
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->ttd->nama ?? 'Fadhli Rahman, S.T., M.T.' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                2. &nbsp;NIP/NUPTK
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->ttd->nuptk ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                3. &nbsp;Pangkat/Golongan/Ruangan
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->ttd->pangkatgolongan ?? 'Lektor / III B' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                4. &nbsp;Jabatan
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->ttd->jabatan ?? 'Wakil Dekan Fakultas Teknik' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                5. &nbsp;Pada Fakultas
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                Teknik UIM
            </td>
        </tr>

        <tr>
            <td class="label">
                6. &nbsp;Dengan Lama Masa Jabatan
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                4 (Empat) Tahun
            </td>
        </tr>

    </table>


    {{-- =====================================================
         PERNYATAAN
         ===================================================== --}}
    <p class="section">
        Menyatakan dengan sesungguhnya bahwa:
    </p>


    {{-- =====================================================
         DATA MAHASISWA
         ===================================================== --}}
    <table class="data-table">

        <tr>
            <td class="label">
                1. &nbsp;Nama
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $pengajuan->nama ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                2. &nbsp;NIM
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $pengajuan->nim ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                3. &nbsp;Fakultas/Jurusan
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                Fakultas Teknik / {{ $pengajuan->prodi ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                4. &nbsp;Institusi
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                Universitas Islam Makassar
            </td>
        </tr>

        <tr>
            <td class="label">
                5. &nbsp;Semester
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->semester ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                6. &nbsp;Alamat
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->alamat ?? '-' }}
            </td>
        </tr>

    </table>


    {{-- =====================================================
         DATA ORANG TUA / WALI
         ===================================================== --}}
    <p class="section">
        Dengan Wali Orang Tua/Wali Anak tersebut adalah:
    </p>

    <table class="data-table">

        <tr>
            <td class="label">
                1. &nbsp;Nama
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->namaortu ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                2. &nbsp;NIP / NRP
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->nip ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                3. &nbsp;Pangkat / Golongan
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->pangkatgolongan ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                4. &nbsp;Instansi
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->instansi ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                5. &nbsp;Jabatan
            </td>

            <td class="colon">
                :
            </td>

            <td class="isi">
                {{ $surat->jabatan ?? '-' }}
            </td>
        </tr>

    </table>


    {{-- =====================================================
         KETERANGAN MAHASISWA
         ===================================================== --}}
    <p class="section">
        Adalah benar Mahasiswa Universitas Islam Makassar Fakultas Teknik
        Program Studi {{ $pengajuan->prodi ?? '-' }}
        Semester {{ $surat->semester ?? '-' }}
        Tahun Ajaran 2025/2026.
    </p>


    {{-- =====================================================
         PENUTUP
         ===================================================== --}}
    <p class="section">
        Demikian surat pernyataan ini di buat dengan sebenarnya untuk
        dipergunakan sebagaimana mestinya.
    </p>

    <p class="arabic">
        Wallahu Muaffiq Ilaa Aqwamith Tharieq
    </p>

    <p class="arabic" style="margin-bottom: 8pt;">
        Wassalamualaikum Wr Wb
    </p>


    {{-- =====================================================
         TANGGAL DAN TANDA TANGAN
         ===================================================== --}}
    <table style="margin-top: 2pt;">
        <tr>
            <td style="width: 55%;"></td>

            <td style="width: 45%; text-align: center;">

                <p style="text-align: center;">
                    PadaTanggal :
                    {{ tanggalHijri($surat->tanggal_surat) }} H
                </p>

                <p style="text-align: center;">
                    {{ tanggal($surat->tanggal_surat) }} M
                </p>

                <p style="text-align: center; margin-top: 3pt;">
                    Wakil Dekan,
                </p>

                @if ($ttd)

                    <div style="height: 75pt; text-align: center;">
                        <img
                            src="data:image/png;base64,{{ $ttd }}"
                            style="width: 100px; height: auto;"
                            alt=""
                        >
                    </div>

                @else

                    <div style="height: 48pt;"></div>

                @endif

                <p class="ttd" style="text-align: center;">
                    {{ $surat->ttd->nama ?? '-' }}
                </p>

                <p style="text-align: center;">
                    NUPTK. {{ $surat->ttd->nuptk ?? '-' }}
                </p>

            </td>
        </tr>
    </table>


    {{-- =====================================================
         TEMBUSAN
         ===================================================== --}}
    <div class="tembusan">

        <p style="font-size: 8pt;">
            <u>Tembusan Yth. :</u>
        </p>

        <ol>
            <li>Dekan</li>
            <li>Arsip</li>
        </ol>

    </div>

</body>

</html>
