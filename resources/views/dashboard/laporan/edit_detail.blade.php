@extends('dashboard.layout')

@section('content')
    <h3>Edit Data Aset</h3>
    <form action="/detail-asset/{{ $type }}/{{ $asset->id ?? '' }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row row-cols-md-2 row-cols-1 g-2">
            @if ($type == '01' || $type == '02' || $type == '06')
                <div class="col">
                    <div class="mb-3">
                        <label for="luas" class="form-label">Luas (m<sup>2</sup>)
                        </label>
                        <input value="{{ $asset->detailAset->luas ?? '' }}" type="number" class="form-control" name="luas"
                            id="luas" placeholder="Luas">
                    </div>
                </div>
            @endif
            @if ($type == '01' || $type == '02' || $type == '06')
                <div class="col">
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input value="{{ $asset->detailAset->alamat ?? '' }}" type="text" class="form-control"
                            name="alamat" id="alamat" placeholder="Alamat">
                    </div>
                </div>
            @endif
            @if ($type == '01')
                <div class="col">
                    <div class="mb-3">
                        <label for="hak" class="form-label">Hak</label>
                        <input value="{{ $asset->detailAset->hak ?? '' }}" type="text" class="form-control"
                            name="hak" id="hak" placeholder="Hak">
                    </div>
                </div>
            @endif
            @if ($type == '01' || $type == '02' || $type == '06')
                <div class="col">
                    <div class="mb-3">
                        <label for="tanggal_sertifikat" class="form-label">Tanggal Sertifikat</label>
                        <input value="{{ $asset->detailAset->tanggal_sertifikat ?? '' }}" type="date"
                            class="form-control" name="tanggal_sertifikat" id="tanggal_sertifikat"
                            placeholder="Tanggal Sertifikat">

                    </div>
                </div>
            @endif
            @if ($type == '01' || $type == '02' || $type == '06')
                <div class="col">
                    <div class="mb-3">
                        <label for="no_sertifikat" class="form-label">Nomor Sertifikat</label>
                        <input value="{{ $asset->detailAset->no_sertifikat ?? '' }}" type="text" class="form-control"
                            name="no_sertifikat" id="no_sertifikat" placeholder="Nomor Sertifikat">

                    </div>
                </div>
            @endif
            @if ($type == '01')
                <div class="col">
                    <div class="mb-3">
                        <label for="penggunaan" class="form-label">Penggunaan</label>
                        <input value="{{ $asset->detailAset->penggunaan ?? '' }}" type="text" class="form-control"
                            name="penggunaan" id="penggunaan" placeholder="Penggunaan">

                    </div>
                </div>
            @endif
            @if ($type == '02' || $type == '06')
                <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bertingkat" id="bertingkat-1"
                            {{ $asset->detailAset->bertingkat == 'bertingkat' ? 'checked' : '' ?? '' }} value="bertingkat">
                        <label class="form-check-label" for="bertingkat-1">Bertingkat</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bertingkat" id="bertingkat-2"
                            {{ $asset->detailAset->bertingkat == 'tidak' ? 'checked' : '' ?? '' }} value="tidak">
                        <label class="form-check-label" for="bertingkat-2">Tidak Bertingkat</label>
                    </div>

                </div>
            @endif
            @if ($type == '02' || $type == '06')
                <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="beton" id="beton-1"
                            {{ $asset->detailAset->beton == 'beton' ? 'checked' : '' ?? '' }} value="beton">
                        <label class="form-check-label" for="beton-1">Beton</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="beton" id="beton-2"
                            {{ $asset->detailAset->beton == 'tidak' ? 'checked' : '' ?? '' }} value="tidak">
                        <label class="form-check-label" for="beton-2">Tidak Beton</label>
                    </div>

                </div>
            @endif
            @if ($type == '02')
                <div class="col">
                    <div class="mb-3">
                        <label for="luas_lantai" class="form-label">Luas Lantai</label>
                        <input value="{{ $asset->detailAset->luas_lantai ?? '' }}" type="number" class="form-control"
                            name="luas_lantai" id="luas_lantai" placeholder="Luas Lantai">

                    </div>
                </div>
            @endif
            @if ($type == '02' || $type == '06')
                <div class="col">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input value="{{ $asset->detailAset->status ?? '' }}" type="text" class="form-control"
                            name="status" id="status" placeholder="Status">

                    </div>
                </div>
            @endif
            @if ($type == '02')
                <div class="col">
                    <div class="mb-3">
                        <label for="kode_tanah" class="form-label">Kode Tanah</label>
                        <input value="{{ $asset->detailAset->kode_tanah ?? '' }}" type="text" class="form-control"
                            name="kode_tanah" id="kode_tanah" placeholder="Kode Tanah">

                    </div>
                </div>
            @endif
            @if ($type == '05')
                <div class="col border p-3">
                    <h5>Buku/Pustaka</h5>
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input value="{{ $asset->detailAset->judul_buku ?? '' }}" type="text" class="form-control"
                            name="judul_buku" id="judul_buku" placeholder="Judul Buku">

                    </div>

                    <div class="mb-3">
                        <label for="spesifikasi_buku" class="form-label">Spesifikasi Buku</label>
                        <input value="{{ $asset->detailAset->spesifikasi_buku ?? '' }}" type="text"
                            class="form-control" name="spesifikasi_buku" id="spesifikasi_buku"
                            placeholder="Spesifikasi Buku">

                    </div>
                </div>
                <div class="col border p-3">
                    <h5>Barang Bercorak Kesenian/Kebudayaan</h5>
                    <div class="mb-3">
                        <label for="asal_kesenian" class="form-label">Asal Kesenian</label>
                        <input value="{{ $asset->detailAset->asal_kesenian ?? '' }}" type="text" class="form-control"
                            name="asal_kesenian" id="asal_kesenian" placeholder="Asal Kesenian">

                    </div>

                    <div class="mb-3">
                        <label for="pencipta_kesenian" class="form-label">Pencipta Kesenian</label>
                        <input value="{{ $asset->detailAset->pencipta_kesenian ?? '' }}" type="text"
                            class="form-control" name="pencipta_kesenian" id="pencipta_kesenian"
                            placeholder="Pencipta Kesenian">

                    </div>

                    <div class="mb-3">
                        <label for="bahan_kesenian" class="form-label">Bahan Kesenian</label>
                        <input value="{{ $asset->detailAset->bahan_kesenian ?? '' }}" type="text"
                            class="form-control" name="bahan_kesenian" id="bahan_kesenian" placeholder="Bahan Kesenian">

                    </div>
                </div>
                <div class="col border p-3">
                    <h5>Hewan/Ternak dan Tumbauhan</h5>
                    <div class="mb-3">
                        <label for="jenis_hewan" class="form-label">Jenis</label>
                        <input value="{{ $asset->detailAset->jenis_hewan ?? '' }}" type="text" class="form-control"
                            name="jenis_hewan" id="jenis_hewan" placeholder="Jenis">

                    </div>

                    <div class="mb-3">
                        <label for="ukuran_hewan" class="form-label">Ukuran</label>
                        <input value="{{ $asset->detailAset->ukuran_hewan ?? '' }}" type="text" class="form-control"
                            name="ukuran_hewan" id="ukuran_hewan" placeholder="Ukuran">

                    </div>
                </div>
            @endif
            @if ($type == '05' || $type == 'kir')
                <div class="col">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input value="{{ $asset->detailAset->jumlah ?? '' }}" type="number" class="form-control"
                            name="jumlah" id="jumlah" placeholder="Jumlah">

                    </div>
                </div>
            @endif
            @if ($type == '06')
                <div class="col">
                    <div class="mb-3">
                        <label for="jenis_bangunan" class="form-label">Jenis Bangunan</label>
                        <select class="form-select" name="jenis_bangunan" id="jenis_bangunan">
                            <option value="">Pilih Jenis</option>
                            <option value="p"
                                {{ $asset->detailAset->jenis_bangunan == 'p' ? 'selected' : '' ?? '' }}>
                                Permanen
                            </option>
                            <option value="sp"
                                {{ $asset->detailAset->jenis_bangunan == 'sp' ? 'selected' : '' ?? '' }}>
                                Semi
                                Permanen</option>
                            <option value="d"
                                {{ $asset->detailAset->jenis_bangunan == 'd' ? 'selected' : '' ?? '' }}>
                                Darurat</option>
                        </select>
                    </div>
                </div>
            @endif
            @if ($type == '06')
                <div class="col">
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input value="{{ $asset->detailAset->tanggal_mulai ?? '' }}" type="date" class="form-control"
                            name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai">

                    </div>
                </div>
            @endif
            @if ($type == 'kir')
                <div class="col">
                    <div class="mb-3">
                        <label for="spesifikasi_ruangan" class="form-label">Spesifikasi Ruangan</label>
                        <input value="{{ $asset->detailAset->spesifikasi_ruangan ?? '' }}" type="text"
                            class="form-control" name="spesifikasi_ruangan" id="spesifikasi_ruangan"
                            placeholder="Spesifikasi Ruangan">

                    </div>
                </div>
            @endif
            @if ($type == 'kir')
                <div class="col">
                    <div class="mb-3">
                        <label for="no_seri_pabrik" class="form-label">No Seri Pabrik</label>
                        <input value="{{ $asset->detailAset->no_seri_pabrik ?? '' }}" type="text"
                            class="form-control" name="no_seri_pabrik" id="no_seri_pabrik" placeholder="No Seri Pabrik">

                    </div>
                </div>
            @endif
            @if ($type == 'kir' || $type == '03')
                <div class="col">
                    <div class="mb-3">
                        <label for="ukuran" class="form-label">Ukuran</label>
                        <input value="{{ $asset->detailAset->ukuran ?? '' }}" type="text" class="form-control"
                            name="ukuran" id="ukuran" placeholder="Ukuran">

                    </div>
                </div>
            @endif
            @if ($type == 'kir')
                <div class="col">
                    <div class="mb-3">
                        <label for="keterangan_mutasi" class="form-label">Keterangan Mutasi</label>
                        <input value="{{ $asset->detailAset->keterangan_mutasi ?? '' }}" type="text"
                            class="form-control" name="keterangan_mutasi" id="keterangan_mutasi"
                            placeholder="Keterangan Mutasi">

                    </div>
                </div>
            @endif
            @if ($type == 'bia')
                <div class="col">
                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input value="{{ $asset->detailAset->satuan ?? '' }}" type="text" class="form-control"
                            name="satuan" id="satuan" placeholder="Satuan">

                    </div>
                </div>
            @endif
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
@endsection
