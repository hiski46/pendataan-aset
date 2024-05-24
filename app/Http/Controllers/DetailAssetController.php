<?php

namespace App\Http\Controllers;

use App\Exports\BiaExport;
use App\Models\Asset;
use App\Models\DetailAset;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DetailAssetController extends Controller
{
    public function kia($type)
    {
        $assets = new Asset;
        if ($type != 'kir' && $type != 'bia') {
            $assets = $assets->whereHas('kodefikasiAset', function ($query) use ($type) {
                return $query->where('kode_golongan', $type);
            });
        }
        $data['assets'] = $assets->get();
        $data['type'] = $type;
        return view('dashboard.laporan.kia_' . $type, $data);
    }

    public function editDetail($type, Asset $asset)
    {
        $data['asset'] = $asset->load('detailAset');
        $data['type'] = $type;

        return view('dashboard.laporan.edit_detail', $data);
    }

    public function save(Request $request, $type, Asset $asset)
    {
        $data = $request->except('_token');
        $detail = $asset->detailAset;
        if ($detail) {
            if ($detail->update($data)) {
                return redirect("/kia/$type")->with('message', 'Data berhasil di-update');
            }
        }
        $data['asset_id'] = $asset->id;
        if (DetailAset::create($data)) {
            return redirect("/kia/$type")->with('message', 'Data berhasil di-update');
        }
        return back()->withErrors(['error' => 'terjadi kesalhan']);
    }

    public function export()
    {
        return Excel::download(new BiaExport, 'buku_inventaris_aset' . date('YmdHi') . '.xlsx');
    }
}
