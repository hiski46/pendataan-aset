<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodefikasiAset extends Model
{
    use HasFactory;

    public function golongan()
    {
        return $this->getGolongan($this->kode_golongan);
    }

    public function getGolongan($id = null)
    {
        $golongan = [
            '01' => 'Lahan Tanah',
            '02' => 'Bangunan',
            '03' => 'Mesin dan Peralatan',
            '04' => 'Teknologi Informasi',
            '05' => 'Tetap Lainnya ',
            '06' => 'Kontruksi Dalam Pengerjaan',
        ];
        if ($id) {
            return $golongan[$id];
        }
        return $golongan;
    }

    public function asset()
    {
        return $this->hasMany(Asset::class, 'kodefikasi_aset_id', 'id');
    }
}
