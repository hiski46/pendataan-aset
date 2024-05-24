<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class TransactionExport implements FromQuery
{
    use Exportable;

    public $client_id;
    public function __construct(int $client_id = null)
    {
        $this->client_id = $client_id;
    }

    public function query()
    {
        $query = Transaction::query()->selectRaw('tanggal, jenis, keterangan, clients.nama, jumlah, metode')->join('clients', 'clients.id', '=', 'id_client');

        if ($this->client_id) {
            $query = $query->where('id_client', $this->client_id);
        }
        return $query;
    }
}
