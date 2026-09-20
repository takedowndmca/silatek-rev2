<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>
        Surat Keterangan Keabsahan Data
    </title>

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
            font-size: 10pt;
            line-height: 1.35;
            text-align: justify;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
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

        .right {
            text-align: right;
        }

        .judul {
            text-align: center;
            margin-top: 2pt;
            margin-bottom: 18pt;
        }

        .judul .title {
            font-size: 11pt;
            font-weight: bold;
            text-decoration: underline;
        }

        .judul .nomor {
            font-size: 9pt;
        }

        .salam {
            font-style: italic;
            margin-bottom: 8pt;
        }

        .arabic {
            font-weight: bold;
            font-style: italic;
        }

        .data-pejabat td {
            font-size: 10pt;
            line-height: 1.25;
        }

        .data-mahasiswa td {
            font-size: 10pt;
            line-height: 1.35;
        }

        .table-perubahan {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8pt;
            margin-bottom: 12pt;
        }

        .table-perubahan th,
        .table-perubahan td {
            border: 1px solid #000;
            padding: 3pt 4pt;
            font-size: 9pt;
            line-height: 1.2;
            vertical-align: middle;
        }

        .table-perubahan th {
            text-align: center;
            font-weight: bold;
        }

        .table-perubahan td {
            text-align: center;
        }

        .ttd {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>

</head>

<body>
    {{-- =====================================================
     KOP SURAT
     ===================================================== --}}
    <img src="{{ public_path('assets/images/kop_fakultas.png') }}" alt=""
        style="width: 100%; height: auto; margin-bottom: 5pt;">


    {{-- =====================================================
     JUDUL
     ===================================================== --}}
    <div class="judul">

        <div class="title">
            SURAT KETERANGAN KEABSAHAN DATA
        </div>

        <div class="nomor">
            Nomor: {{ $surat->nomor }}
        </div>

    </div>


    {{-- =====================================================
     PEMBUKA
     ===================================================== --}}
    <p class="salam">
        Bismillahirrahmanirrahim
    </p>

    <p style="margin-bottom: 10pt;">
        Yang bertanda tangan di bawah ini:
    </p>


    {{-- =====================================================
     DATA PEJABAT
     ===================================================== --}}
    <table class="data-pejabat" style="margin-bottom: 15pt;">

        <tr>
            <td style="width: 125pt;">
                Nama
            </td>

            <td style="width: 10pt;">
                :
            </td>

            <td>
                {{ optional($surat->ttd)->nama ?? 'Fadhli Rahman, ST., MT.' }}
            </td>
        </tr>

        <tr>
            <td>
                NUPTK
            </td>

            <td>
                :
            </td>

            <td>
                {{ optional($surat->ttd)->nuptk ?? '3958752653130132' }}
            </td>
        </tr>

        <tr>
            <td>
                Pangkat/Golongan/Ruang
            </td>

            <td>
                :
            </td>

            <td>
                Lektor – III/c
            </td>
        </tr>

        <tr>
            <td>
                Jabatan
            </td>

            <td>
                :
            </td>

            <td>
                Wakil Dekan
            </td>
        </tr>

        <tr>
            <td>
                Fakultas
            </td>

            <td>
                :
            </td>

            <td>
                Teknik UIM
            </td>
        </tr>

    </table>


    {{-- =====================================================
     PERNYATAAN
     ===================================================== --}}
    <p style="margin-bottom: 10pt;">
        Menyatakan dengan sesungguhnya bahwa:
    </p>


    {{-- =====================================================
     DATA MAHASISWA
     ===================================================== --}}
    <table class="data-mahasiswa" style="margin-bottom: 12pt;">

        <tr>
            <td style="width: 125pt;">
                Nama
            </td>

            <td style="width: 10pt;">
                :
            </td>

            <td>
                {{ $surat->mahasiswa }}
            </td>
        </tr>

        <tr>
            <td>
                NIM
            </td>

            <td>
                :
            </td>

            <td>
                {{ $surat->nim }}
            </td>
        </tr>

        <tr>
            <td>
                Program Studi
            </td>

            <td>
                :
            </td>

            <td>
                {{ $surat->program_studi }}
            </td>
        </tr>

        <tr>
            <td>
                Semester
            </td>

            <td>
                :
            </td>

            <td>
                {{ $surat->semester }}
            </td>
        </tr>

    </table>


    {{-- =====================================================
     KETERANGAN PERBAIKAN
     ===================================================== --}}
    <p style="margin-bottom: 5pt;">
        Adalah benar mengajukan perbaikan data sebagaimana terlampir:
    </p>


    {{-- =====================================================
     TABEL PERUBAHAN DATA
     ===================================================== --}}
    <table class="table-perubahan">

        <thead>
            <tr>
                <th style="width: 33%;">
                    Salah
                </th>

                <th style="width: 34%;">
                    Benar
                </th>

                <th style="width: 33%;">
                    Keterangan
                </th>
            </tr>
        </thead>

        <tbody>

            @forelse ($surat->perubahan as $perubahan)
                <tr>

                    <td>
                        {{ $perubahan->salah ?: '-' }}
                    </td>

                    <td>
                        {{ $perubahan->benar }}
                    </td>

                    <td>
                        {{ $perubahan->keterangan }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td>
                        -
                    </td>

                    <td>
                        -
                    </td>

                    <td>
                        -
                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>


    {{-- =====================================================
     PENUTUP
     ===================================================== --}}
    <p style="margin-bottom: 25pt;">
        Demikian perbaikan data ini kami buat atas perhatian dan kerjasamanya
        diucapkan terima kasih.
    </p>


    {{-- =====================================================
     SALAM PENUTUP
     ===================================================== --}}
    <p class="arabic" style="margin-bottom: 3pt;">
        Wallahul Muaffiq Ilaa Aqwamith Tharieq
    </p>

    <p class="arabic" style="margin-bottom: 15pt;">
        Wassalamu'alaikum Warahmatullahi Wabarakatuh
    </p>


    {{-- =====================================================
     TANDA TANGAN
     ===================================================== --}}
    <table>

        <tr>

            <td style="width: 55%;"></td>

            <td style="width: 45%;">

                <p class="center" style="margin-bottom: 3pt;">
                    Makassar,
                    {{ tanggalHijri($surat->tanggal_surat) }} H
                </p>

                <p class="center" style="margin-bottom: 18pt;">
                    {{ tanggal($surat->tanggal_surat) }} M
                </p>

                <p class="center" style="margin-bottom: 5pt;">
                    Wakil Dekan,
                </p>


                {{-- QR / TANDA TANGAN --}}
                @if ($ttd)
                    <div
                        style="
                    text-align: center;
                    height: 75pt;
                    margin-bottom: 3pt;
                ">

                        <img src="data:image/png;base64, {{ $ttd }}" style="width: 75pt; height: 75pt;">

                    </div>
                @else
                    <div style="height: 75pt;"></div>
                @endif


                {{-- NAMA --}}
                <p class="center ttd">
                    {{ optional($surat->ttd)->nama ?? 'Fadhli Rahman, ST., MT.' }}
                </p>

                <p class="center">
                    NUPTK.
                    {{ optional($surat->ttd)->nuptk ?? '3958752653130132' }}
                </p>

            </td>

        </tr>

    </table>

</body>

</html>
