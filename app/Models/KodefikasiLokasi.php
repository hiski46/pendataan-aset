<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodefikasiLokasi extends Model
{
    use HasFactory;

    public function ruangan()
    {
        return $this->getRuangan($this->kode_golongan);
    }

    public function getRuangan($id = null)
    {
        $ruangan = [
            'LY' => 'Lobby',
            'PS' => 'Pos Satpam',
        ];
        if ($id) {
            return $ruangan[$id];
        }
        return $ruangan;
    }

    public function asset()
    {
        return $this->hasMany(Asset::class, 'kodefikasi_lokasi_id', 'id');
    }
}
