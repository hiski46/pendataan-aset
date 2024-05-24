<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    public function kodefikasiAset()
    {
        return $this->belongsTo(KodefikasiAset::class, 'kodefikasi_aset_id');
    }
    public function kodefikasiLokasi()
    {
        return $this->belongsTo(KodefikasiLokasi::class, 'kodefikasi_lokasi_id');
    }
    public function detailAset()
    {
        return $this->hasOne(DetailAset::class, 'asset_id');
    }

    public function getKondisi()
    {
        switch ($this->kondisi) {
            case 'b':
                return 'Baik';
                break;
            case 'rr':
                return 'Rusak Ringan';
                break;
            case 'rb':
                return 'Rusak Berat';
                break;
            default:
                return '-';
                break;
        }
    }
}
