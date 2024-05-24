@extends('dashboard.layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>KIA Lahan Tanah</h3>
    </div>
    <div class="table-responsive">
        <table class="table table table-bordered align-middle">
            <thead class="align-middle table-dark text-center">
                <tr>
                    <th rowspan="3">No.</th>
                    <th rowspan="3">Jenis Aset/Nama Aset</th>
                    <th colspan="2" rowspan="2">Nomor</th>
                    <th rowspan="3">Luas (m<sup>2</sup>)</th>
                    <th rowspan="3">Tahun Pengadaan </th>
                    <th rowspan="3">Letak/Alamat</th>
                    <th colspan="3">Status</th>
                    <th rowspan="3">Penggunaan</th>
                    <th rowspan="3">Asal Usul</th>
                    <th rowspan="3">Harga (Rp)</th>
                    <th rowspan="3">Ket</th>
                    <th rowspan="3">Action</th>
                </tr>
                <tr>
                    <th rowspan="2">Hak</th>
                    <th colspan="2">Sertifikat</th>
                </tr>
                <tr>
                    <th rowspan="1">Kode Aset</th>
                    <th rowspan="1">Register</th>
                    <th rowspan="1">Tanggal</th>
                    <th rowspan="1">Nomor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $asset->nama }} ({{ $asset->jenis }})</td>
                        <td>{{ $asset->kodefikasiAset->kodefikasi_aset }}</td>
                        <td>{{ $asset->kodefikasiAset->no_register }}</td>
                        <td>{{ $asset->detailAset->luas ?? '-' }}</td>
                        <td>{{ $asset->tahun }}</td>
                        <td>{{ $asset->detailAset->alamat ?? '-' }}</td>
                        <td>{{ $asset->detailAset->hak ?? '-' }}</td>
                        <td>{{ $asset->detailAset->tanggal_sertifikat ?? '-' }}</td>
                        <td>{{ $asset->detailAset->no_sertifikat ?? '-' }}</td>
                        <td>{{ $asset->detailAset->penggunaan ?? '-' }}</td>
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
