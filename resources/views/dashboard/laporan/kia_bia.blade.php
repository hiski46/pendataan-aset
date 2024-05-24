@extends('dashboard.layout')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Kartu Inventaris Ruangan</h3>
        <a href="/export" class="btn btn-success">Export Excel <span data-feather="table" class="align-text-bottom"></span></a>
    </div>
    <div class="table-responsive">
        <table class="table table table-bordered align-middle">
            <thead class="align-middle table-dark text-center">
                <tr>

                    <th colspan="3">Nomor</th>
                    <th colspan="3">Spesifikasi Aset</th>
                    <th rowspan="2">Bahan</th>
                    <th rowspan="2">Asal-Usul Perolehan Aset</th>
                    <th rowspan="2">Tanggal Perolehan</th>
                    <th rowspan="2">Satuan</th>
                    <th rowspan="2">Kondisi Aset (B/RR/RB)</th>
                    <th colspan="2">Jumlah</th>
                    <th rowspan="2">Ket</th>
                    <th rowspan="2">action</th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Kode Aset</th>
                    <th>Register</th>
                    <th>Nama/Jenis Aset</th>
                    <th>Merek/Tipe</th>
                    <th>No. Sertifikat/No. Pabrik/No. Rangka/No. Mesin</th>
                    <th>Aset</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $asset->kodefikasiAset->kodefikasi_aset }}</td>
                        <td>{{ $asset->kodefikasiAset->no_register }}</td>
                        <td>{{ $asset->nama }} ({{ $asset->jenis }})</td>
                        <td>{{ $asset->merek ?? '-' }}</td>
                        <td>{{ $asset->detailAset->no_sertifikat ?? ($asset->detailAset->no_seri_pabrik ?? '-') }}</td>
                        <td>{{ $asset->material ?? '-' }}</td>
                        <td>{{ $asset->riwayat ?? '-' }}</td>
                        <td>{{ $asset->tahun ?? '-' }}</td>
                        <td>{{ $asset->detailAset->satuan ?? '-' }}</td>
                        <td>{{ strtoupper($asset->kondisi ?? '-') }}</td>
                        <td>{{ $asset->detailAset->jumlah ?? '-' }}</td>
                        <td>{{ $asset->harga ?? '-' }}</td>
                        <td>{{ $asset->ket ?? '-' }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a type="button" href="/edit-detail/{{ $type }}/{{ $asset->id }}"
                                    class="btn btn-outline-dark"><span data-feather="edit"></span></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
