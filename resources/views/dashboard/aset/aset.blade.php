@extends('dashboard.layout')

@section('content')
    <h1>
        Hallo {{ auth()->user()->name }}
    </h1>
    <hr>
    <div class="d-flex justify-content-between mb-3">
        <h3>Pendataan Aset Aset</h3>
        <a href="/asset/create" type="button" class="btn btn-primary"> <span data-feather="plus"></span> Add</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Harga(Rp)</th>
                    <th>Tahun Perolehan</th>
                    <th>Riwat Perolehan</th>
                    <th>Kodefikasi Aset</th>
                    <th>Kodefikasi Lokasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <td>
                            {{ $asset->nama }}
                        </td>
                        <td>
                            {{ $asset->jenis }}
                        </td>
                        <td>
                            {{ $asset->harga }}
                        </td>
                        <td>{{ $asset->tahun }}</td>
                        <td>{{ $asset->riwayat }}</td>
                        <td>{{ $asset->kodefikasiAset->kodefikasi_aset }}</td>
                        <td>{{ $asset->kodefikasiLokasi->kodefikasi_lokasi }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a type="button" href="/asset/{{ $asset->id }}" class="btn btn-outline-dark"><span
                                        data-feather="eye"></span></a>
                                <a type="button" href="/asset/{{ $asset->id }}/edit" class="btn btn-outline-dark"><span
                                        data-feather="edit"></span></a>
                                <button type="button" class="btn btn-outline-dark" data-id="{{ $asset->id }}"
                                    onclick="alertDelete(this)"><span data-feather="trash"></span></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<script>
    function alertDelete(params) {

        Swal.fire({
            title: "Are you sure to delete this data ?",
            showCancelButton: true,
            confirmButtonText: "Delete",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/asset/" + $(params).data('id'),
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        if (res.success) {
                            icon = 'success'
                        } else {
                            icon = 'error';
                        }
                        Swal.fire({
                            icon: icon,
                            title: res.message,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 7000,
                            timerProgressBar: true,
                        });

                        if (res.success) {
                            location.reload();
                        }
                    }
                });
            }
        });
    }
</script>
