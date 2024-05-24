@extends('dashboard.layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>KIA Tetap Lainnya</h3>
    </div>
    <div class="table-responsive">
        <table class="table table table-bordered align-middle">
            <thead class="align-middle table-dark text-center">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Nama Aset/Jenis Aset</th>
                    <th colspan="2">Nomor</th>
                    <th colspan="2">Buku/Pustaka</th>
                    <th colspan="3">Barang Bercorak Kesenian/Kebudayaan</th>
                    <th colspan="2">Hewan/Ternak dan Tumbuhan</th>
                    <th rowspan="2">Jml</th>
                    <th rowspan="2">Tahun Cetak/Pembelian</th>
                    <th rowspan="2">Asal-Usul</th>
                    <th rowspan="2">Harga (Rp)</th>
                    <th rowspan="2">Ket</th>
                    <th rowspan="2">Action</th>
                </tr>
                <tr>
                    <th>Kode Aset</th>
                    <th>Register</th>
                    <th>Judul/Pencipta</th>
                    <th>Spesifikasi</th>
                    <th>Asal Daerah</th>
                    <th>Pencipta</th>
                    <th>Bahan</th>
                    <th>Jenis</th>
                    <th>Ukuran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $asset->nama }} ({{ $asset->jenis }})</td>
                        <td>{{ $asset->kodefikasiAset->kodefikasi_aset }}</td>
                        <td>{{ $asset->kodefikasiAset->no_register }}</td>
                        <td>{{ $asset->detailAset->judul_buku ?? '-' }}</td>
                        <td>{{ $asset->detailAset->spesifikasi_buku ?? '-' }}</td>
                        <td>{{ $asset->detailAset->asal_kesenian ?? '-' }}</td>
                        <td>{{ $asset->detailAset->pencipta_kesenian ?? '-' }}</td>
                        <td>{{ $asset->detailAset->bahan_kesenian ?? '-' }}</td>
                        <td>{{ $asset->detailAset->jenis_hewan ?? '-' }}</td>
                        <td>{{ $asset->detailAset->ukuran_hewan ?? '-' }}</td>
                        <td>{{ $asset->detailAset->jumlah ?? '-' }}</td>
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
