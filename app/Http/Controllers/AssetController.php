<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\KodefikasiAset;
use App\Models\KodefikasiLokasi;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['assets'] = Asset::get();
        return view('dashboard.aset.aset', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kodefikasi_aset'] = KodefikasiAset::get();
        $data['kodefikasi_lokasi'] = KodefikasiLokasi::get();
        return view('dashboard.aset.add_aset', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetRequest $request)
    {
        $data = $request->except('_token');
        if ($request->file_legal) {
            if ($request->file('file_legal')) {
                $file = $request->file('file_legal');
                $file_name = 'legal_' . str_replace(' ', '_', strtolower($request->nama)) . strtotime(now()) . '.' . $file->getClientOriginalExtension();
                $folder = "file_legal/";
                $file->storeAs($folder, $file_name, ['disk' => 'public']);
                $data['file_legal']  = $file_name;
            }
        }
        $model = new Asset;
        if ($model->create($data)) {
            return redirect('/asset')->with('message', 'Asset berhasil ditambah');
        }

        return back()->withErrors(['error' => 'Terjadi kesalahan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        $asset->descKondisi = $asset->getKondisi();
        $asset->kodefikasi_aset = $asset->kodefikasiAset;
        $asset->kodefikasi_lokasi = $asset->kodefikasiLokasi;
        return view('dashboard.aset.view_asset', $asset);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        $asset->kodefikasi_aset = KodefikasiAset::get();
        $asset->kodefikasi_lokasi = KodefikasiLokasi::get();
        return view('dashboard.aset.edit_aset', $asset);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssetRequest  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $data = $request->except('_token', '_method');
        if ($request->file_legal) {
            if ($request->file('file_legal')) {
                $file = $request->file('file_legal');
                $file_name = 'legal_' . str_replace(' ', '_', strtolower($request->nama)) . strtotime(now()) . '.' . $file->getClientOriginalExtension();
                $folder = "file_legal/";
                $file->storeAs($folder, $file_name, ['disk' => 'public']);
                $data['file_legal']  = $file_name;
            }
        }

        if ($asset->update($data)) {
            return redirect('/asset')->with('message', 'Asset berhasil diubah');
        }

        return back()->withErrors(['error' => 'Terjadi kesalahan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        if (!$asset->delete()) {
            return response()->json(['success' => false, 'message' => ['Terjadi Kesalahan']]);
        }

        return response()->json(['success' => true, 'message' => ['Asset berhasil dihapus']]);
    }
}
