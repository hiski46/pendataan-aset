@extends('dashboard.layout')

@section('content')
    <h3>Tambah Kodefikasi Aset</h3>
    <form action="/kodefikasi_aset" method="post">
        @csrf
        <div class="mb-3">
            <div class="row">
                <div class="col-4">
                    <label for="kode_golongan" class="form-label">Golongan</label>
                    <select name="kode_golongan" id="kode_golongan" class="form-select" required>
                        <option value="">Pilih Golongan</option>
                        @foreach ($golongan as $k => $v)
                            <option value="{{ $k }}">{{ $k }}-{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="bidang" class="form-label">Bidang</label>
                    <div class="input-group">
                        <input type="text" name="kode_bidang" class="form-control" placeholder="Kode"
                            aria-label="kode_bidang" required>
                        <input type="text" name="bidang" class="form-control w-50" placeholder="Nama Bidang"
                            aria-label="Server" required>
                    </div>

                </div>
                <div class="col-4">
                    <label for="kelompok" class="form-label">Kelompok</label>
                    <div class="input-group">
                        <input type="text" name="kode_kelompok" class="form-control" placeholder="Kode"
                            aria-label="kode_kelompok" required>
                        <input type="text" name="kelompok" class="form-control w-50" placeholder="Nama Kelompok"
                            aria-label="Server" required>
                    </div>

                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="kodefikasi_aset" class="form-label">Kodefikasi Aset</label>
            <input type="text" class="form-control" name="kodefikasi_aset" id="kodefikasi_aset"
                placeholder="Kodefikasi Aset" required>
        </div>
        <div class="mb-3">
            <label for="no_register" class="form-label">Nomor Register</label>
            <input type="text" class="form-control" name="no_register" id="no_register" placeholder="Nomor Register"
                required>
        </div>
        <div class="mb-3">
            <button class="btn btn-success">Simpan</button>
        </div>
    </form>
@endsection
