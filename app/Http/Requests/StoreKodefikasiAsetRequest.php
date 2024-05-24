<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKodefikasiAsetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode_golongan' => 'required',
            'kode_bidang' => 'required',
            'kode_kelompok' => 'required',
            'kelompok' => 'required',
            'bidang' => 'required',
            'kodefikasi_aset' => 'required',
            'no_register' => 'required',
        ];
    }
}
