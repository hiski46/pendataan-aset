<?php

namespace App\Http\Controllers;

use App\Models\KodefikasiLokasi;
use App\Http\Requests\StoreKodefikasiLokasiRequest;
use App\Http\Requests\UpdateKodefikasiLokasiRequest;

class KodefikasiLokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kodefikasi_lokasi'] = KodefikasiLokasi::get();
        return view('dashboard.kodefikasi_lokasi.kodefikasi_lokasi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new KodefikasiLokasi();
        $data['ruangan'] = $model->getRuangan();
        return view('dashboard.kodefikasi_lokasi.add_kodefikasi_lokasi', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKodefikasiLokasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKodefikasiLokasiRequest $request)
    {
        $model = new KodefikasiLokasi;
        $data = $request->except('_token');
        $data['ruangan'] = $model->getRuangan($request->kode_ruangan);
        if ($model->create($data)) {
            return redirect('/kodefikasi_lokasi')->with('message', 'Kodefikasi lokasi berhasil ditambah');
        }
        return back()->withErrors(['message' => 'Terjadi Kesalahan'])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodefikasiLokasi  $kodefikasiLokasi
     * @return \Illuminate\Http\Response
     */
    public function show(KodefikasiLokasi $kodefikasiLokasi)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodefikasiLokasi  $kodefikasiLokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(KodefikasiLokasi $kodefikasiLokasi)
    {
        $kodefikasiLokasi->ruangans = $kodefikasiLokasi->getRuangan();
        return view('dashboard.kodefikasi_lokasi.edit_kodefikasi_lokasi', $kodefikasiLokasi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKodefikasiLokasiRequest  $request
     * @param  \App\Models\KodefikasiLokasi  $kodefikasiLokasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKodefikasiLokasiRequest $request, KodefikasiLokasi $kodefikasiLokasi)
    {
        $data = $request->except('_token', '_method');
        $data['ruangan'] = $kodefikasiLokasi->getRuangan($request->kode_ruangan);
        if ($kodefikasiLokasi->update($data)) {
            return redirect('/kodefikasi_lokasi')->with('message', 'Kodefikasi lokasi berhasil diubah');
        }
        return back()->withErrors(['message' => 'Terjadi Kesalahan'])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodefikasiLokasi  $kodefikasiLokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodefikasiLokasi $kodefikasiLokasi)
    {
        if (!$kodefikasiLokasi->delete()) {
            return response()->json(['success' => false, 'message' => ['Terjadi Kesalahan']]);
        }

        return response()->json(['success' => true, 'message' => ['Kodefikasi lokasi berhasil dihapus']]);
    }
}
