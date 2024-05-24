@extends('layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h1>Riwayat Transaksi {{ $client_name ?? '' }}</h1>
        <div class="my-auto">
            <a href="/export-transaction?client_id={{ request()->client_id ?? '' }}" type="button"
                class="btn btn-success">Export Excell</a>
            <a href="/create-transaction" type="button" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Klien</th>
                    <th>Jenis Transaksi</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Metode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction as $trans)
                    <tr>
                        <td>{{ date('d M Y', strtotime($trans->tanggal)) }}</td>
                        <td>{{ $trans->client->nama }}</td>
                        <td>{{ $trans->jenis }}</td>
                        <td>{{ $trans->keterangan }}</td>
                        <td>Rp. {{ $trans->jumlah }}</td>
                        <td>{{ $trans->metode }}</td>
                        <td>
                            <a href="/edit-transaction/{{ $trans->id }}" class="btn btn-warning">Edit</a>
                            <a href="/hapus-transaction/{{ $trans->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
