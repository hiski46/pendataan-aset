<?php

namespace App\Http\Controllers;

use App\Models\KodefikasiAset;
use App\Http\Requests\StoreKodefikasiAsetRequest;
use App\Http\Requests\UpdateKodefikasiAsetRequest;

class KodefikasiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kodefikasi_aset'] = KodefikasiAset::get();
        return view('dashboard.kodefikasi_aset.kodefikasi_aset', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kodefikasi = new KodefikasiAset();
        $data['golongan'] = $kodefikasi->getGolongan();
        return view('dashboard.kodefikasi_aset.add_kodefikasi_aset', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKodefikasiAsetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKodefikasiAsetRequest $request)
    {
        $model = new KodefikasiAset;
        $data = $request->except('_token');
        $data['golongan'] = $model->getGolongan($request->kode_golongan);
        if ($model->create($data)) {
            return redirect('/kodefikasi_aset')->with('message', 'Kodefikasi aset berhasil ditambah');
        }
        return back()->withErrors(['message' => 'Terjadi Kesalahan'])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodefikasiAset  $kodefikasiAset
     * @return \Illuminate\Http\Response
     */
    public function show(KodefikasiAset $kodefikasiAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodefikasiAset  $kodefikasiAset
     * @return \Illuminate\Http\Response
     */
    public function edit(KodefikasiAset $kodefikasiAset)
    {
        $kodefikasiAset->golongans = $kodefikasiAset->getGolongan();
        return view('dashboard.kodefikasi_aset.edit_kodefikasi_aset', $kodefikasiAset);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKodefikasiAsetRequest  $request
     * @param  \App\Models\KodefikasiAset  $kodefikasiAset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKodefikasiAsetRequest $request, KodefikasiAset $kodefikasiAset)
    {
        $data = $request->except('_token', '_method');
        $data['golongan'] = $kodefikasiAset->getGolongan($request->kode_golongan);
        if ($kodefikasiAset->update($data)) {
            return redirect('/kodefikasi_aset')->with('message', 'Kodefikasi aset berhasil diubah');
        }
        return back()->withErrors(['message' => 'Terjadi Kesalahan'])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodefikasiAset  $kodefikasiAset
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodefikasiAset $kodefikasiAset)
    {
        if (!$kodefikasiAset->delete()) {
            return response()->json(['success' => false, 'message' => ['Terjadi Kesalahan']]);
        }

        return response()->json(['success' => true, 'message' => ['Kodefikasi aset berhasil dihapus']]);
    }
}
