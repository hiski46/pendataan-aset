@extends('dashboard.layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>KIA Kontruksi Dalam Pengerjaan</h3>
    </div>
    <div class="table-responsive">
        <table class="table table table-bordered align-middle">
            <thead class="align-middle table-dark text-center">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Jenis Aset/Nama Aset</th>
                    <th rowspan="2">Bangunan (P, SP, D)</th>
                    <th colspan="2">Konstruksi Bangunan</th>
                    <th rowspan="2">Luas (m²)</th>
                    <th rowspan="2">Letak/Lokasi Alamat</th>
                    <th colspan="2">Dokumen</th>
                    <th rowspan="2">Tanggal, Bulan, Tahun Mulai</th>
                    <th rowspan="2">Status Aset</th>
                    <th rowspan="2">Nomor Kode Aset</th>
                    <th rowspan="2">Asal-Usul</th>
                    <th rowspan="2">Nilai Kontrak (Rp)</th>
                    <th rowspan="2">Ket</th>
                    <th rowspan="2">action</th>
                </tr>
                <tr>
                    <th>Bertingkat/Tidak</th>
                    <th>Beton/Tidak</th>
                    <th>Tgl</th>
                    <th>No</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $asset->nama }} ({{ $asset->jenis }})</td>
                        <td>{{ strtoupper($asset->detailAset->jenis_bangunan ?? '-') }}</td>
                        <td>{{ $asset->detailAset->bertingkat == 'bertingkat' ? '✔' : '❌' }}</td>
                        <td>{{ $asset->detailAset->beton == 'beton' ? '✔' : '❌' }}</td>
                        <td>{{ $asset->detailAset->luas ?? '-' }}</td>
                        <td>{{ $asset->detailAset->alamat ?? '-' }}</td>
                        <td>{{ $asset->detailAset->tanggal_sertifikat ?? '-' }}</td>
                        <td>{{ $asset->detailAset->no_sertifikat ?? '-' }}</td>
                        <td>{{ $asset->detailAset->tanggal_mulai ?? '-' }}</td>
                        <td>{{ $asset->detailAset->status ?? '-' }}</td>
                        <td>{{ $asset->kodefikasiAset->kodefikasi_aset ?? '-' }}</td>
                        <td>{{ $asset->riwayat ?? '-' }}</td>
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
