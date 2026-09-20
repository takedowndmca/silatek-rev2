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

    <h1>PENGUJI SEMINAR KPI</h1>
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
                    <li>Bahwa dalam penyempurnaan penulisan dan penyelesaian studi Program Sarjana (S-1) kepada
                        Mahasiswa perlu ditetapkan Penguji Skripsi.</li>
                    <li>Bahwa untuk maksud tersebut pada point (a) diatas, maka mereka yang tersebut namanya dalam surat
                        keputusan dianggap mampu dan memenuhi syarat untuk penguji skripsi.</li>
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
                    <li>Peraturan pemerintah RI Nomor 12 Tahun 2012 tentang pendidikan tinggi;</li>
                    <li>Kepmendiknas Nomor 184/U/2001;</li>
                    <li>Kepmendiknas Nomor 71/D/2000;</li>
                    <li>Peraturan Akademik Universitas Islam Makassar;</li>
                    <li>Surat Direktur Perguruan Tinggi Nomor: 520/D4/IV/09/1993 Tentang Uji Skripsi.</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td>Memperhatikan</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                <ol class="list-num">
                    <li>Keputusan Rektor UIM Nomor DCLXXXI/UIM/Skep/A.02/2020, Tentang Perubahan Biaya Ujian Seminar
                        Proposal, Hasil, Tutup/Skripsi Fakultas Teknik UIM;</li>
                    <li>Panduan Tugas Akhir Mahasiswa Fakultas Teknik UIM Al-Gazali Tahun 2023;</li>
                    <li>Hasil Rapat Pimpinan Fakultas Pada Tanggal 26 Maret 2025.</li>
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
                Mahasiswa Fakultas Teknik UIM Al-Gazali yang akan melakukan penelitian ditulis dalam bentuk laporan
                tugas akhir mahasiswa dan harus dipertahankan di depan penguji yang ditetapkan dengan surat keputusan
                Dekan Fakultas Teknik UIM Al-Gazali.
            </td>
        </tr>
        <tr>
            <td>Kedua</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                Bahwa Dosen Penguji yang dimaksud :
                <table>
                    <tr>
                        <td style="width: 15pt">1.</td>
                        <td style="width: 100pt">
                            Ketua / Pembimbing
                        </td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>{{ $surat->pembimbing }}</td>
                    </tr>
                    @php
                        $nomor = 2;
                        $penguji = explode(PHP_EOL, $surat->penguji);
                    @endphp
                    @for ($i = 0; $i < count(explode(PHP_EOL, $surat->penguji)); $i++)
                        <tr>
                            <td style="width: 15pt">{{ $nomor++ }}.</td>
                            <td style="width: 100pt">
                                Penguji {{ romawi($i + 1) }}
                            </td>
                            <td class="center" style="width: 10pt">:</td>
                            <td>{{ explode(PHP_EOL, $surat->penguji)[$i] }}</td>
                        </tr>
                    @endfor
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
                        <td style="width: 100pt">Nama / NIM</td>
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
                        <td style="width: 100pt">Program Studi</td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>{{ $pengajuan->prodi }}</td>
                    </tr>
                    <tr>
                        <td style="width: 100pt">Tempat KPI</td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>{{ $surat->tempat_kpi }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Keempat</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                Pelaksanaan Ujian Insya Allah pada :
                <table>
                    <tr>
                        <td style="width: 100pt">Hari/Tanggal</td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>{{ tanggalHari($surat->tanggal_ujian) }}</td>
                    </tr>
                    <tr>
                        <td>Pukul</td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>{{ $surat->waktu }}</td>
                    </tr>
                    <tr>
                        <td>Tempat</td>
                        <td class="center" style="width: 10pt">:</td>
                        <td>{{ $surat->tempat }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Kelima</td>
            <td class="center" style="width: 10pt">:</td>
            <td>
                Segala biaya terbitnya surat keputusan ini dibebankan kepada UIM.
            </td>
        </tr>
        <tr>
            <td>Keenam</td>
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

    <div class="tembusan">
        <span>Tembusan:</span>
        <ol>
            <li>Wakil Rektor I UIM;</li>
            <li>Masing-masing Pembimbing;</li>
            <li>Masing-masing Penguji;</li>
            <li>Arsip</li>
        </ol>
    </div>
</body>

</html>
