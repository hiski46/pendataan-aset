@extends('dashboard.layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>KIA Bangunan</h3>
    </div>
    <div class="table-responsive">
        <table class="table table table-bordered align-middle">
            <thead class="align-middle table-dark text-center">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Jenis Aset/Nama Aset</th>
                    <th colspan="2">No.</th>
                    <th rowspan="2">Kondisi Aset (B, RR, RB)</th>
                    <th colspan="2">Konstruksi Aset</th>
                    <th rowspan="2">Luas Lantai (m<sup>2</sup>)</th>
                    <th rowspan="2">Letak/Lokasi Alamat</th>
                    <th colspan="2">Dokumen Gedung</th>
                    <th rowspan="2">Luas (m<sup>2</sup>)</th>
                    <th rowspan="2">Status Aset</th>
                    <th rowspan="2">Nomor Kode Tanah</th>
                    <th rowspan="2">Asal Usul</th>
                    <th rowspan="2">Harga (Rp)</th>
                    <th rowspan="2">Ket</th>
                    <th rowspan="2">Action</th>
                </tr>
                <tr>
                    <th>Kode Aset</th>
                    <th>Registrasi</th>
                    <th>Bertingkat/Tidak</th>
                    <th>Beton/Tidak</th>
                    <th>Tgl</th>
                    <th>Nomor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $asset->nama }} ({{ $asset->jenis }})</td>
                        <td>{{ $asset->kodefikasiAset->kodefikasi_aset }}</td>
                        <td>{{ $asset->kodefikasiAset->no_register }}</td>
                        <td>{{ strtoupper($asset->kondisi ?? '-') }}</td>
                        <td>{{ $asset->detailAset->bertingkat == 'bertingkat' ? '✔' : '❌' }}</td>
                        <td>{{ $asset->detailAset->beton == 'beton' ? '✔' : '❌' }}</td>
                        <td>{{ $asset->detailAset->luas_lantai ?? '-' }}</td>
                        <td>{{ $asset->detailAset->alamat ?? '-' }}</td>
                        <td>{{ $asset->detailAset->tanggal_sertifikat ?? '-' }}</td>
                        <td>{{ $asset->detailAset->no_sertifikat ?? '-' }}</td>
                        <td>{{ $asset->detailAset->luas ?? '-' }}</td>
                        <td>{{ $asset->detailAset->status ?? '-' }}</td>
                        <td>{{ $asset->detailAset->kode_tanah ?? '-' }}</td>
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
