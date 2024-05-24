@extends('dashboard.layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>Kartu Inventaris Ruangan</h3>
    </div>
    <div class="table-responsive">
        <table class="table table table-bordered align-middle">
            <thead class="align-middle table-dark text-center">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Jenis Aset/Nama Aset</th>
                    <th rowspan="2">Spesifikasi</th>
                    <th rowspan="2">Aspek Legal</th>
                    <th rowspan="2">No. Seri Pabrik</th>
                    <th rowspan="2">Ukuran</th>
                    <th rowspan="2">Bahan</th>
                    <th rowspan="2">Tahun Pembuatan/Pembelian</th>
                    <th rowspan="2">Jumlah Aset/Register</th>
                    <th rowspan="2">Harga Beli (Rp.)</th>
                    <th colspan="3">kondisi</th>
                    <th rowspan="2">Keterangan Mutasi Dll.</th>
                    <th rowspan="2">Ket</th>
                    <th rowspan="2">action</th>
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
                        <td>{{ $asset->nama }} ({{ $asset->jenis }})</td>
                        <td>{{ $asset->detailAset->spesifikasi_ruangan ?? '-' }}</td>
                        <td>{{ $asset->aspek_legal }}</td>
                        <td>{{ $asset->detailAset->no_seri_pabrik ?? '-' }}</td>
                        <td>{{ $asset->detailAset->ukuran ?? '-' }}</td>
                        <td>{{ $asset->material ?? '-' }}</td>
                        <td>{{ $asset->tahun ?? '-' }}</td>
                        <td>{{ $asset->detailAset->jumlah ?? '-' }}</td>
                        <td>{{ $asset->harga ?? '-' }}</td>
                        <td>{{ $asset->kondisi == 'b' ? '✔' : '' }}</td>
                        <td>{{ $asset->kondisi == 'rr' ? '✔' : '' }}</td>
                        <td>{{ $asset->kondisi == 'rb' ? '✔' : '' }}</td>
                        <td>{{ $asset->detailAset->keterangan_mutasi ?? '-' }}</td>
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
