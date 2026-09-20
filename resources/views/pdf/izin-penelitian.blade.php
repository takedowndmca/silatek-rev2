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
        }

        .ttd {
            font-weight: bold;
            text-decoration: underline;
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
    <table style="margin-bottom: 12pt;">
        <tr>
            <td style="width: 55pt;">Nomor</td>

            <td style="width: 10pt;" class="center">
                :
            </td>

            <td>
                {{ $surat->nomor ?? '-' }}
            </td>

            <td style="text-align: right;">
                {{ tanggalHijri($surat->tanggal_surat) }} H
            </td>
        </tr>

        <tr>
            <td>
                Lampiran
            </td>

            <td class="center">
                :
            </td>

            <td>
                {{ $surat->lampiran ?? '-' }}
            </td>

            <td style="text-align: right;">
                {{ tanggal($surat->tanggal_surat) }} M
            </td>
        </tr>

        <tr>
            <td>
                Hal
            </td>

            <td class="center">
                :
            </td>

            <td colspan="2">
                <b>Permohonan Penelitian Tugas Akhir</b>
            </td>
        </tr>
    </table>


    {{-- =====================================================
         TUJUAN SURAT
         ===================================================== --}}
    <p style="margin-bottom: 2pt;">
        Kepada Yth.
    </p>

    <p style="font-weight: bold; margin-bottom: 2pt;">
        {{ $surat->tujuan_penelitian }}
    </p>

    <p style="margin-bottom: 12pt;">
        di Tempat
    </p>


    {{-- =====================================================
         SALAM
         ===================================================== --}}
    <p class="salam">
        Bismillahirrahmanirrahim
    </p>

    <p class="salam" style="margin-bottom: 12pt;">
        Assalamu'alaikum Warahmatullahi Wabarakatuh
    </p>


    {{-- =====================================================
         ISI SURAT
         ===================================================== --}}
    <p style="margin-bottom: 8pt;">
        Dengan Hormat, Salam Silaturahmi semoga segala aktivitas
        kita mendapat Ridho dan Hidayah-Nya. Amin. Sehubungan dengan penyelesaian Tugas Akhir (Skripsi), mahasiswa kami
        memerlukan data-data Hasil Penelitian. Maka dengan ini, kami memohon kepada Bapak/Ibu kiranya dapat menerima
        mahasiswa tersebut untuk melakukan penelitian pada instansi/perusahaan
        yang Bapak/Ibu pimpin dengan judul penelitian: <b>
            “{{ $pengajuan->judul ?? ($pengajuan->judul_penelitian ?? ($surat->judul_skripsi ?? '-')) }}”
        </b>
    </p>


    {{-- =====================================================
         DATA MAHASISWA
         ===================================================== --}}
    <table style="margin-bottom: 10pt;">

        <tr>
            <td style="width: 75pt;">
                Nama
            </td>

            <td style="width: 10pt;" class="center">
                :
            </td>

            <td>
                {{ $pengajuan->nama }}
            </td>
        </tr>

        <tr>
            <td>
                Nim
            </td>

            <td class="center">
                :
            </td>

            <td>
                {{ $pengajuan->nim }}
            </td>
        </tr>

        <tr>
            <td>
                Program Studi
            </td>

            <td class="center">
                :
            </td>

            <td>
                {{ $pengajuan->prodi }}
            </td>
        </tr>

    </table>


    {{-- =====================================================
         PENUTUP
         ===================================================== --}}
    <p style="margin-bottom: 10pt;">
        Demikian permohonan ini kami buat, atas perkenan dan kerjasama yang baik
        dihaturkan terima kasih.
    </p>

    <p class="arabic" style="margin-bottom: 4pt;">
        Wallahu Muaffiq Ilaa Aqwamith Tharieq
    </p>

    <p class="arabic" style="margin-bottom: 18pt;">
        Wassalamu'alaikum Wr Wb.
    </p>


    {{-- =====================================================
         TANDA TANGAN
         ===================================================== --}}
    <table>
        <tr>

            <td style="width: 55%;"></td>

            <td style="width: 45%;">

                <p style="text-align: center; margin-bottom: 4pt;">
                    Wakil Dekan
                </p>

                @if ($ttd)
                    <div style="text-align: center; margin-bottom: 2pt;">
                        <img src="data:image/png;base64,{{ $ttd }}" style="width: 100px; height: auto;">
                    </div>

                    <p class="ttd center">
                        {{ $surat->ttd->nama }}
                    </p>

                    <p class="center">
                        NUPTK. {{ $surat->ttd->nuptk }}
                    </p>
                @else
                    <div style="height: 75px;"></div>
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
            <li>Dekan sebagai laporan</li>
            <li>Ketua Program Studi {{ $pengajuan->prodi }}</li>
            <li>Mahasiswa yang bersangkutan</li>
        </ol>

    </div>

</body>

</html>
