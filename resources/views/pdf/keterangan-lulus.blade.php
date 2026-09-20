<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>Surat Keterangan Lulus</title>

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
            line-height: 1.35;
            text-align: justify;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 0;
            vertical-align: top;
        }

        .kop {
            width: 100%;
            margin-bottom: 12pt;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 12pt;
            margin-bottom: 3pt;
        }

        .nomor {
            text-align: center;
            font-size: 10pt;
            margin-bottom: 15pt;
        }

        .salam {
            font-weight: bold;
            margin-bottom: 5pt;
        }

        .data {
            margin-top: 8pt;
            margin-bottom: 10pt;
        }

        .data td {
            line-height: 1.5;
        }

        .label {
            width: 115pt;
        }

        .colon {
            width: 12pt;
            text-align: center;
        }

        .photo-cell {
            width: 100pt;
            text-align: right;
            vertical-align: top;
        }

        .photo-box {
            width: 85px;
            height: 113px;
            border: 1px solid #000;
            margin-left: auto;
            text-align: center;
            font-size: 8pt;
        }

        .photo-box span {
            display: block;
            margin-top: 45px;
            font-size: 8pt;
        }

        .detail {
            margin-top: 5pt;
            margin-bottom: 12pt;
        }

        .detail td {
            line-height: 1.5;
        }

        .detail .label {
            width: 125pt;
        }

        .penutup {
            margin-bottom: 8pt;
        }

        .arabic {
            font-weight: bold;
            font-style: italic;
            margin-bottom: 4pt;
        }

        .ttd {
            margin-top: 12pt;
        }

        .ttd td {
            vertical-align: top;
        }

        .nama-ttd {
            font-weight: bold;
            text-decoration: underline;
        }

    </style>
</head>

<body>

    {{-- ===================================================== --}}
    {{-- KOP --}}
    {{-- ===================================================== --}}

    <img
        src="{{ public_path('assets/images/kop_fakultas.png') }}"
        class="kop"
        alt=""
    >


    {{-- ===================================================== --}}
    {{-- JUDUL --}}
    {{-- ===================================================== --}}

    <p class="judul">
        SURAT KETERANGAN LULUS
    </p>

    <p class="nomor">
        Nomor: {{ $surat->nomor ?? '-' }}
    </p>


    {{-- ===================================================== --}}
    {{-- SALAM --}}
    {{-- ===================================================== --}}

    <p class="salam">
        Bismillahirrahmanirrahim
    </p>

    <p class="salam" style="margin-bottom: 10pt;">
        Assalamu 'Alaikum Warahmatullahi Wabarakatuh
    </p>


    {{-- ===================================================== --}}
    {{-- PEMBUKA --}}
    {{-- ===================================================== --}}

    <p style="margin-bottom: 10pt;">
        Dekan Fakultas Teknik Universitas Islam Makassar
        menerangkan bahwa:
    </p>


    {{-- ===================================================== --}}
    {{-- DATA MAHASISWA + FOTO --}}
    {{-- ===================================================== --}}

    <table class="data">

        <tr>

            <td>

                <table>

                    <tr>
                        <td class="label">
                            Nama
                        </td>

                        <td class="colon">
                            :
                        </td>

                        <td>
                            {{ $pengajuan->nama ?? '-' }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label">
                            NIM
                        </td>

                        <td class="colon">
                            :
                        </td>

                        <td>
                            {{ $pengajuan->nim ?? '-' }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label">
                            Program Studi
                        </td>

                        <td class="colon">
                            :
                        </td>

                        <td>
                            {{ $pengajuan->prodi ?? '-' }}
                        </td>
                    </tr>

                    <tr>
                        <td class="label">
                            Jenjang
                        </td>

                        <td class="colon">
                            :
                        </td>

                        <td>
                            Strata 1 (S1)
                        </td>
                    </tr>

                </table>

            </td>


            {{-- FOTO 3x4 --}}
            <td class="photo-cell">

                <div class="photo-box">
                    <span>FOTO 3 x 4</span>
                </div>

            </td>

        </tr>

    </table>


    {{-- ===================================================== --}}
    {{-- PERNYATAAN LULUS --}}
    {{-- ===================================================== --}}

    <p style="margin-bottom: 10pt;">
        Telah dinyatakan <b>LULUS</b> dan berhak menyandang gelar
        <b>Sarjana Komputer (S.Kom.)</b> pada:
    </p>


    {{-- ===================================================== --}}
    {{-- DETAIL KELULUSAN --}}
    {{-- ===================================================== --}}

    <table class="detail">

        <tr>
            <td class="label">
                Tahun Ajaran
            </td>

            <td class="colon">
                :
            </td>

            <td>
                {{ $surat->tahun_ajaran ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Tanggal Ujian Tutup
            </td>

            <td class="colon">
                :
            </td>

            <td>
                {{ tanggal($surat->tanggal_ujian_tutup) }}
            </td>
        </tr>

        <tr>
            <td class="label">
                IPK
            </td>

            <td class="colon">
                :
            </td>

            <td>
                {{ number_format((float) $surat->ipk, 2) }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Predikat Kelulusan
            </td>

            <td class="colon">
                :
            </td>

            <td>
                {{ $surat->predikat_online ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Judul Penelitian
            </td>

            <td class="colon">
                :
            </td>

            <td>
                {{ $surat->judul_penelitian ?? '-' }}
            </td>
        </tr>

    </table>


    {{-- ===================================================== --}}
    {{-- KETERANGAN --}}
    {{-- ===================================================== --}}

    <p class="penutup">
        Surat Keterangan ini diberikan sebagai pengganti Ijazah Asli
        yang masih dalam proses penyelesaian dan berlaku sampai dengan
        tanggal diterimanya Ijazah mahasiswa tersebut.
    </p>

    <p class="penutup">
        Demikian surat keterangan ini dibuat agar dapat dipergunakan
        sebagaimana mestinya.
    </p>


    {{-- ===================================================== --}}
    {{-- PENUTUP / SALAM --}}
    {{-- ===================================================== --}}

    <p class="arabic">
        Wallahul Muwaffiq Ilaa Aqwamith Tharieq
    </p>

    <p class="arabic">
        Wassalamu 'Alaikum Warahmatullahi Wabarakatuh
    </p>


    {{-- ===================================================== --}}
    {{-- TANGGAL + TTD --}}
    {{-- ===================================================== --}}

    <table style="width: 100%">
        <tr>
            <td style="width: 50%"></td>

            <td style="width: 50%">

                {{-- Tanggal --}}
                <table>
                    <tr>
                        <td>Ditetapkan di</td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>Makassar</td>
                    </tr>

                    <tr>
                        <td>Pada Tanggal</td>
                        <td class="center">:</td>
                        <td>
                            <u>{{ tanggalHijri($surat->tanggal_surat) }} H</u>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            {{ tanggal($surat->tanggal_surat) }} M
                        </td>
                    </tr>
                </table>


                {{-- Paraf Wakil Dekan + Jabatan Dekan --}}
                <div
                    style="
                position: relative;
                margin: 0;
                padding: 0;
                height: 20px;
            ">

                    {{-- Tulisan Dekan tetap --}}
                    <span
                        style="
                    position: absolute;
                    left: 0;
                    top: 0;
                    margin: 0;
                    padding: 0;
                    white-space: nowrap;
                ">
                        Dekan,
                    </span>

                    {{-- Paraf Wakil Dekan --}}
                    @if ($surat->parafWadek)
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('paraf/wadek.png'))) }}"
                            style="
                            position: absolute;
                            left: -25px;
                            top: -5px;
                            width: 25px;
                            height: auto;
                            margin: 0;
                            padding: 0;
                        ">
                    @endif

                </div>


                {{-- TTD / QR Dekan --}}
                @if ($ttd)
                    <div class="qr"
                        style="
                    margin: 0;
                    padding: 0;
                    line-height: 0;
                ">
                        <img src="data:image/png;base64,{{ $ttd }}"
                            style="
                            margin: 0;
                            padding: 0;
                            display: block;
                        ">
                    </div>

                    {{-- Nama Dekan --}}
                    <p class="ttd"
                        style="
                    margin: 0;
                    padding: 0;
                    line-height: 1;
                ">
                        {{ $surat->ttd->nama }}
                    </p>

                    {{-- NUPTK --}}
                    <p
                        style="
                    margin: 0;
                    padding: 0;
                    line-height: 1;
                ">
                        NUPTK. {{ $surat->ttd->nuptk }}
                    </p>
                @else
                    <div style="height: 100px"></div>
                @endif

            </td>
        </tr>
    </table>

</body>

</html>
