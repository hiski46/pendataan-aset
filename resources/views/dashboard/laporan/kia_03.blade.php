@extends('dashboard.layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>KIA Mesin dan Peralatan</h3>
    </div>
    <div class="table-responsive">
        <table class="table table table-bordered align-middle">
            <thead class="align-middle table-dark text-center">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Kode Aset</th>
                    <th rowspan="2">Jenis Aset/Nama Aset</th>
                    <th rowspan="2">Nomor Register</th>
                    <th colspan="3">Kondisi Aset</th>
                    <th rowspan="2">Merek/Tipe</th>
                    <th rowspan="2">Ukuran</th>
                    <th rowspan="2">Bahan</th>
                    <th rowspan="2">Tahun Perolehan</th>
                    <th rowspan="2">Asal-Usul Perolehan</th>
                    <th rowspan="2">Harga (Rp)</th>
                    <th rowspan="2">Ket</th>
                    <th rowspan="2">Action</th>
                </tr>
                <tr>
                    <th>B</th>
                    <th>RR</th>
                    <th>RB</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $asset->kodefikasiAset->kodefikasi_aset }}</td>
                        <td>{{ $asset->nama }} ({{ $asset->jenis }})</td>
                        <td>{{ $asset->kodefikasiAset->no_register }}</td>
                        <td>{{ $asset->kondisi == 'b' ? '✔' : '' }}</td>
                        <td>{{ $asset->kondisi == 'rr' ? '✔' : '' }}</td>
                        <td>{{ $asset->kondisi == 'rb' ? '✔' : '' }}</td>
                        <td>{{ $asset->merek ?? '-' }}</td>
                        <td>{{ $asset->detailAset->ukuran ?? '-' }}</td>
                        <td>{{ $asset->material ?? '-' }}</td>
                        <td>{{ $asset->tahun ?? '-' }}</td>
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
