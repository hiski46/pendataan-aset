@extends('dashboard.layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>All Users</h3>
        <a href="/user/create" type="button" class="btn btn-primary"> <span data-feather="plus"></span> Add</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a type="button" href="/user/{{ $user->id }}" class="btn btn-outline-dark"><span
                                        data-feather="eye"></span></a>
                                <a type="button" href="/user/{{ $user->id }}/edit" class="btn btn-outline-dark"><span
                                        data-feather="edit"></span></a>
                                <button type="button" class="btn btn-outline-dark" data-id="{{ $user->id }}"
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
                title: "Are you sure to delete this user ?",
                showCancelButton: true,
                confirmButtonText: "Delete",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/user/" + $(params).data('id'),
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
