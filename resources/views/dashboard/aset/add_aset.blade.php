@extends('dashboard.layout')

@section('content')
    <h3>Tambah Pendataan Aset</h3>
    <form action="/asset" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row row-cols-md-2 row-cols-1 g-2">
            <div class="col">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Aset</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Aset" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Aset</label>
                    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis Aset">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="aspek_legal" class="form-label">Aspek Legal</label>
                    <input type="text" class="form-control" name="aspek_legal" id="aspek_legal"
                        aria-describedby="help_aspek" placeholder="Aspek Legal">
                    <small id="help_aspek" class="form-text text-muted">Kosngkan jika tidak perlu</small>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="file_legal" class="form-label">Lampiran Bukti Aspek Legal </label>
                    <input type="file" class="form-control" name="file_legal" id="file_legal"
                        placeholder="Lampiran bukti asprk legal" aria-describedby="fileHelpId">
                    <div id="fileHelpId" class="form-text">Kosongkan jika tidak perlu</div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="merek" class="form-label">Merek/Tipe</label>
                    <input type="text" class="form-control" name="merek" id="merek" aria-describedby="merek_help"
                        placeholder="Merek/Tipe">
                    <small id="merek_help" class="form-text text-muted">Kosongkan jika tidak perlu</small>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="material" class="form-label">Material/Bahan</label>
                    <input type="text" class="form-control" name="material" id="material"
                        aria-describedby="material_help" placeholder="Material/Bahan">
                    <small id="material_help" class="form-text text-muted">Kosongkan Jika tidak perlu</small>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" class="form-control" name="tahun" id="tahun" min="1900"
                        max="{{ date('Y') }}" placeholder="Tahun" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="riwayat" class="form-label">Riwayat Perolehan</label>
                    <textarea class="form-control" name="riwayat" id="riwayat" rows="2" placeholder="Riwayat Perolehan" required></textarea>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <select class="form-select" name="kondisi" id="kondisi" aria-describedby="kondisi_help">
                        <option selected value="">Pilih Kondisi</option>
                        <option value="b">Baik</option>
                        <option value="rr">Rusak Ringan</option>
                        <option value="rb">Rusak Berat</option>
                    </select>
                    <small id="kondisi_help" class="form-text text-muted">Kosongkan Jika tidak perlu</small>
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="kodefikasi_aset_id" class="form-label">Kodefikasi Aset</label>
                    <select class="form-select" name="kodefikasi_aset_id" id="kodefikasi_aset_id" required>
                        <option selected value="">Pilih Kodefikasi</option>
                        @foreach ($kodefikasi_aset as $ka)
                            <option value="{{ $ka->id }}">{{ $ka->kodefikasi_aset }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="kodefikasi_lokasi_id" class="form-label">Kodefikasi Lokasi</label>
                    <select class="form-select" name="kodefikasi_lokasi_id" id="kodefikasi_lokasi_id" required>
                        <option selected value="">Pilih Kodefikasi</option>
                        @foreach ($kodefikasi_lokasi as $kl)
                            <option value="{{ $kl->id }}">{{ $kl->kodefikasi_lokasi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="ket" class="form-label">Keteranagan</label>
                    <input type="text" class="form-control" name="ket" id="ket" placeholder="Keteranagn"
                        required>
                </div>
            </div>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
@endsection
