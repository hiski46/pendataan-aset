@extends('dashboard.layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>Kodefikasi Aset</h3>
        <a href="/kodefikasi_lokasi/create" type="button" class="btn btn-primary"> <span data-feather="plus"></span> Add</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Lantai</th>
                    <th>Ruangan</th>
                    <th>KIR</th>
                    <th>Kodefikasi Lokasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kodefikasi_lokasi as $k)
                    <tr>

                        <td>
                            <b>{{ $k->kode_lantai }}</b> - {{ $k->lantai }}
                        </td>
                        <td>
                            <b>{{ $k->kode_ruangan }}</b> - {{ $k->ruangan }}
                        </td>
                        <td>
                            Ruang Inventaris
                        </td>
                        <td>{{ $k->kodefikasi_lokasi }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                {{-- <a type="button" href="/kodefikasi_lokasi/{{ $k->id }}"
                                    class="btn btn-outline-dark"><span data-feather="eye"></span></a> --}}
                                <a type="button" href="/kodefikasi_lokasi/{{ $k->id }}/edit"
                                    class="btn btn-outline-dark"><span data-feather="edit"></span></a>
                                <button type="button" class="btn btn-outline-dark" data-id="{{ $k->id }}"
                                    onclick="alertDelete(this)"><span data-feather="trash"></span></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        function alertDelete(params) {
            Swal.fire({
                title: "Are you sure to delete this data ?",
                showCancelButton: true,
                confirmButtonText: "Delete",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/kodefikasi_lokasi/" + $(params).data('id'),
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
@endsection
