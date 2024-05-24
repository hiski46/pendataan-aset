@extends('dashboard.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Detail Aset</div>
            <div class="card-body">
                <h3 class="card-title">{{ $nama }}</h3>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Jenis Aset</th>
                                        <td>: {{ $jenis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Aspek Legal</th>
                                        <td>: {{ $aspek_legal ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lampiran Bukti Aspek Legal</th>
                                        <td>:
                                            @if ($file_legal)
                                                <a href="/storage/file_legal/{{ $file_legal }}"
                                                    target="_blank">Download</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Merek/Tipe</th>
                                        <td>: {{ $merek ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Material/Bahan</th>
                                        <td>: {{ $material ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>: Rp. {{ $harga }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Prolehan</th>
                                        <td>: {{ $tahun }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Riwayat Perolehan</th>
                                        <td>: {{ $riwayat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kondisi</th>
                                        <td>: {{ $descKondisi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>: {{ $ket }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kodefikasi Aset</th>
                                        <td>: {{ $kodefikasi_aset['kodefikasi_aset'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kodefikasi Lokasi</th>
                                        <td>: {{ $kodefikasi_lokasi['kodefikasi_lokasi'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>KIR</th>
                                        <td>: Ruangan Inventaris</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
