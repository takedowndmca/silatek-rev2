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

    <table style="width: 100%" class="mb">
        <tr>
            <td style="width: 80pt">Nomor</td>
            <td class="center" style="width: 10pt">:</td>
            <td>{{ $surat->nomor_undangan }}</td>
            <td rowspan="3" style="width: 200pt">
                <table>
                    <tr>
                        <td>Makassar,</td>
                        <td style="width: 10pt"></td>
                        <td><u>{{ tanggalHijri($surat->tanggal_surat) }} H</u></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ tanggal($surat->tanggal_surat) }} M</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td class="center" style="width: 10pt">:</td>
            <td>1 (satu) berkas</td>
        </tr>
        <tr>
            <td>Hal</td>
            <td class="center" style="width: 10pt">:</td>
            <td><b>Undangan Ujian Seminar KPI</b></td>
        </tr>
    </table>

    <p><b>Kepada Yang Terhormat,</b></p>
    <table class="mb">

        @if ($surat->kategori == 'non-skripsi')

            {{-- KETUA SIDANG --}}
            <tr>
                <td style="width: 200pt">
                    {{ $surat->ketua_sekertaris }}
                </td>
                <td>(Ketua Sidang)</td>
            </tr>

            {{-- PEMBIMBING --}}
            <tr>
                <td style="width: 200pt">
                    {{ $surat->pembimbing }}
                </td>
                <td>(Pembimbing Utama)</td>
            </tr>

            {{-- PENGUJI --}}
            <tr>
                <td style="width: 200pt">
                    {{ $surat->penguji }}
                </td>
                <td>(Penguji)</td>
            </tr>
        @else
            {{-- ==========================================
             PEMBIMBING
             ========================================== --}}

            @foreach (preg_split('/\r\n|\r|\n/', $surat->pembimbing) as $pembimbing)
                @if (trim($pembimbing) !== '')
                    <tr>
                        <td style="width: 200pt">
                            {{ trim($pembimbing) }}
                        </td>

                        <td>
                            ({{ $loop->first ? 'Pembimbing' : 'Co. Pembimbing' }})
                        </td>
                    </tr>
                @endif
            @endforeach





            {{-- ==========================================
             PENGUJI
             ========================================== --}}

            @foreach (preg_split('/\r\n|\r|\n/', $surat->penguji) as $penguji)
                @if (trim($penguji) !== '')
                    <tr>
                        <td style="width: 200pt">
                            {{ trim($penguji) }}
                        </td>

                        <td>
                            (Penguji)
                        </td>
                    </tr>
                @endif
            @endforeach

            {{-- ==========================================
             KETUA & SEKRETARIS SIDANG
             ========================================== --}}

            @foreach (preg_split('/\r\n|\r|\n/', $surat->ketua_sekertaris) as $index => $ketuaSekretaris)
                @if (trim($ketuaSekretaris) !== '')
                    <tr>
                        <td style="width: 200pt">
                            {{ trim($ketuaSekretaris) }}
                        </td>

                        <td>
                            ({{ $index == 0 ? 'Ketua Sidang' : 'Sekretaris Sidang' }})
                        </td>
                    </tr>
                @endif
            @endforeach

        @endif

    </table>

    <p class="mb">Di - <br> Makassar</p>

    <div class="salam mb">
        <p>Bismillahirrahmanirrahim</p>
        <p>Assalamu 'Alaikum Warrahmatullahi Wabarakatuh</p>
    </div>

    <p class="mb">Salam silaturahmi, semoga segala aktivitas keseharian kita bernilai ibadah di sisi Allah SWT.
        Bersama ini kami
        mengundang Bapak/Ibu pada Ujian <b>Seminar KPI</b> yang akan dipersentasekan oleh Saudara:</p>

    <table style="width: 100%" class="mb">
        <tr>
            <td style="width: 120pt">Nama Mahasiswa</td>
            <td style="width: 10pt">:</td>
            <td>{{ $pengajuan->nama }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Stambuk</td>
            <td style="width: 10pt">:</td>
            <td>{{ nim($pengajuan->nim) }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Program Studi</td>
            <td style="width: 10pt">:</td>
            <td>{{ $pengajuan->prodi }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Tempat KPI</td>
            <td style="width: 10pt">:</td>
            <td>{{ $surat->tempat_kpi }}</td>
        </tr>
    </table>

    <p class="mb">Insya Allah dilaksanakan pada :</p>
    <table style="width: 100%" class="mb">
        <tr>
            <td style="width: 120pt">Hari/Tanggal</td>
            <td style="width: 10pt">:</td>
            <td>{{ tanggalHari($surat->tanggal_ujian) }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Waktu</td>
            <td style="width: 10pt">:</td>
            <td>{{ $surat->waktu }}</td>
        </tr>
        <tr>
            <td style="width: 120pt">Tempat</td>
            <td style="width: 10pt">:</td>
            <td>{{ $surat->tempat }}</td>
        </tr>
    </table>

    <p class="mb">Demikian penyampaian kami, atas pengertian dan kerjasamanya kami ucapkan terima kasih.</p>

    <div class="salam">
        <p>Wallahul Muaffiq Ilaa Aqwamith Tharieq</p>
        <p>Wassalamu'alaikum Wr.Wb</p>
    </div>

    <table style="width: 100%">
        <tr>
            <td style="width: 50%"></td>

            <td style="width: 50%">

                {{-- Tanggal --}}
                <table>


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
            <li>Ketua Yayasan Perguruan Tinggi Al-Gazali di Makassar;</li>
            <li>Rektor Universitas Islam Makassar;</li>
            <li>Ketua Prodi Teknik Informatika</li>
        </ol>
    </div>
</body>

</html>
