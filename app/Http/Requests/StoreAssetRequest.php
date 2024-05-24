<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
            'nama' => 'required',
            'jenis' => 'required',
            'file_legal' => 'nullable|max:2480|file',
            'harga' => 'required|numeric',
            'tahun' => 'required',
            'riwayat' => 'required',
            'ket' => 'required',
            'kodefikasi_aset_id' => 'required',
            'kodefikasi_lokasi_id' => 'required',
        ];
    }
}
