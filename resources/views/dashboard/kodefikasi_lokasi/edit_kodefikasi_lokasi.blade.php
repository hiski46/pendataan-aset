@extends('dashboard.layout')

@section('content')
    <h3>Ubah Kodefikasi Lokasi</h3>
    <form action="/kodefikasi_lokasi/{{ $id }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <div class="row">
                <div class="col-4">
                    <label for="lantai" class="form-label">Lantai</label>
                    <div class="input-group">
                        <input type="text" name="kode_lantai" class="form-control" placeholder="Kode"
                            aria-label="kode_lantai" required value="{{ $kode_lantai }}">
                        <input type="text" name="lantai" class="form-control w-50" placeholder="Nama Lantai"
                            aria-label="Server" required value="{{ $lantai }}">
                    </div>

                </div>
                <div class="col-4">
                    <label for="kode_ruangan" class="form-label">Ruangan</label>
                    <select name="kode_ruangan" id="kode_ruangan" class="form-select" required>
                        <option value="">Pilih Ruangan</option>
                        @foreach ($ruangans as $k => $v)
                            <option value="{{ $k }}" {{ $k == $kode_ruangan ? 'selected' : '' }}>
                                {{ $k }}-{{ $v }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
        <div class="mb-3">
            <label for="kodefikasi_lokasi" class="form-label">Kodefikasi Lokasi</label>
            <input type="text" class="form-control" name="kodefikasi_lokasi" id="kodefikasi_lokasi"
                placeholder="Kodefikasi Lokasi" value="{{ $kodefikasi_lokasi }}" required>
        </div>
        <div class="mb-3">
            <label for="kir" class="form-label">KIR</label>
            <select class="form-select " name="kir" id="kir" required>
                <option selected>Pilih KIR</option>
                <option value="1" selected>Ruanga Infentaris</option>
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-success">Simpan</button>
        </div>
    </form>
@endsection
