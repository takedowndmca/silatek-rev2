<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Surat {{ $layanan['label'] }}</title>
    <style>
        * {
            font-family: Arial, sans-serif;
            font-size: 12pt;
        }

        .judul {
            text-align: center;
            margin-bottom: 12pt;
        }

        h1 {
            text-align: center;
        }

        h1,
        p {
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        p {
            text-align: justify;
        }

        b,
        strong,
        u {
            margin: 0;
            padding: 0;
            font-size: 10pt;
        }

        .salam {
            font-weight: bold;
            font-style: italic;
        }

        table {
            border-spacing: 0;
            border: 0;
        }

        table td {
            vertical-align: top;
            padding: 0;
            border: 0;
            font-size: 10pt;
        }

        .center {
            text-align: center;
        }

        ol li {
            text-align: justify;
            font-size: 10pt;
        }

        .list-alpha {
            list-style-type: lower-alpha;
            padding-left: 20pt;
            margin: 0;
        }

        .list-num {
            list-style-type: decimal;
            padding-left: 20pt;
            margin: 0;
        }

        .mb {
            margin-bottom: 12pt;
        }

        .ttd {
            font-weight: bold;
            text-decoration: underline;
        }

        .qr {
            padding: 0 46pt;
        }

        .tembusan * {
            margin: 0;
            font-size: 8pt;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('assets/images/kop_fakultas.png') }}" alt=""
        style="width: 100%; height: auto; margin-bottom: 12pt;">

    <div class="judul">
        <h1>KEPUTUSAN DEKAN FAKULTAS TEKNIK</h1>
        <h1>UNIVERSITAS ISLAM MAKASSAR (UIM) AL-GAZALI</h1>
        <p class="center"><b>Nomor: {{ $surat->nomor }}</b></p>
    </div>

    <h1>PENGANGKATAN DOSEN PEMBIMBING</h1>
    <h1>KULIAH PRAKTEK INDUSTRI (KPI)</h1>
    <h1>UNIVERSITAS ISLAM MAKASSAR</h1>

    <p class="salam">Bismillahirrahmanirrahim</p>
    <table style="width: 100%; margin-bottom: 12pt;">
        <tr>
            <td colspan="3">Dekan Fakultas TEKNIK UIM, setelah:</td>
        </tr>
        <tr>
            <td>Menimbang</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                <ol class="list-alpha">
                    <li>Bahwa dalam dalam rangka memberikan bimbingan Kuliah Praktek Industri (KPI) kepada mahasiswa
                        untuk persyaratan menyelesaikan studi jenjang program sarjana (S.1);</li>
                    <li>Bahwa untuk maksud tersebut pada point (a) diatas, maka mereka yang tersebut namanya dalam surat
                        keputusan ini dianggap mampu dan memenuhi syarat unuk menjadi pembimbing/konsultan terhadap
                        mahasiswa sebagaimana terlampir.</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td>Mengingat</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                <ol class="list-num">
                    <li>Undang-undang sistem pendidikan Nasional RI Nomor 20 Tahun 2003 Tentang Sistem Pendidikan
                        Nasional;</li>
                    <li>Undang-undang RI Nomor 14 Tahun 2015 Tentang Guru dan Dosen;</li>
                    <li>Peraturan pemerintah RI Nomor 12 Tahun 2012 tentang pendidikan tinggi;</li>
                    <li>Peraturan pemerintah RI Nomor 14 Tahun 2014 tentang penyelenggaraan perguruan tinggi;</li>
                    <li>Keputusan Mendikbud RI Nomor 3 Tahun 2020 Tentang Standar Nasional Pendidikan;</li>
                    <li>Keputusan Dirjen Dikti Depdikbud RI Nomor 1999. Dikti/Kep/1992;</li>
                    <li>Akte Pendirian yayan perguruan tinggi Al-Gazali Makassar, Nomor 119 Tahun 1982 tanggal 25
                        Februari 1984 dan Akta Nomor 7 Tahun 1992 tanggal 6 Oktober 1992.</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td>Memperhatikan</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                <ol class="list-num">
                    <li>SK Rektor Universitas Islam Makassar 219/UIM/Skep/2/2001, tentang penetapan besarnya biaya tugas
                        akhir;</li>
                    <li>Panduan Tugas Akhir Mahasiswa Fakultas Teknik UIM Al-Gazali Tahun 2023;</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td class="center" colspan="3" style="padding: 12pt 0;">MEMUTUSKAN</td>
        </tr>
        <tr>
            <td colspan="3">Menetapkan:</td>
        </tr>
        <tr>
            <td>Pertama</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                Mahasiswa Fakultas Teknik UIM Al-Gazali yang akan melakukan Kuliah Praktek Industri (KPI) perlu
                dibimbing oleh dosen pembimbing yang akan ditetapkan/diangkat dengan surat keputusan Dekan Fakultas
                Teknik UIM Al-Gazali.
            </td>
        </tr>
        <tr>
            <td>Kedua</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                Bahwa Dosen Pembimbing yang dimaksud :
                <table>
                    @foreach (explode(PHP_EOL, $surat->pembimbing) as $pembimbing)
                        <tr>
                            <td style="width: 15pt">{{ $loop->iteration }}.</td>
                            <td style="width: 200pt">{{ $pembimbing }}</td>
                            <td>(Pembimbing)</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td>Ketiga</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                Mahasiswa yang melakukan Kuliah Praktek Industri (KPI) adalah :
                <table>
                    <tr>
                        <td>Nama / NIM</td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>
                            <table>
                                @foreach (explode(PHP_EOL, $surat->mahasiswa) as $mahasiswa)
                                    <tr>
                                        <td>{{ $mahasiswa }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Program Studi</td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>{{ $pengajuan->prodi }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Keempat</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                Segala biaya terbitnya surat keputusan ini dibebankan kepada UIM Al-Gazali.
            </td>
        </tr>
        <tr>
            <td>Kelima</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                Surat keputusan ini berlaku sejak tanggal ditetapkan dengan ketentuan, apabila dalam penetapan keputusan
                ini terdapat kekeliruan dalam penetapannya akan diadakan peninjauan dan perbaikan kembali sebagaimana
                mestinya.
            </td>
        </tr>
    </table>


    <table style="width: 100%">
        <tr>
            <td style="width: 50%"></td>
            <td style="width: 50%">

                <table>
                    <tr>
                        <td>Ditetapkan di</td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>Makassar</td>
                    </tr>
                    <tr>
                        <td>Pada Tanggal</td>
                        <td class="center">:</td>
                        <td><u>{{ tanggalHijri($surat->tanggal_surat) }} H</u></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ tanggal($surat->tanggal_surat) }} M</td>
                    </tr>
                </table>


                <p>{{ ucwords(str_replace('_', ' ', $surat->penandatangan)) }},</p>
                @if ($ttd)
                    <div class="qr">
                        <img src="data:image/png;base64, {{ $ttd }}">
                    </div>

                    <p class="ttd">{{ $surat->ttd->nama }}</p>
                    <p>NUPTK. {{ $surat->ttd->nuptk }}</p>
                @else
                    <div style="height: 100px"></div>
                @endif
            </td>
        </tr>
    </table>

    <div class="tembusan">
        <span>Tembusan:</span>
        <ol>
            <li>Wakil Rektor I UIM</li>
            <li>Masing-masing Pembimbing</li>
            <li>Arsip</li>
        </ol>
    </div>
</body>

</html>
