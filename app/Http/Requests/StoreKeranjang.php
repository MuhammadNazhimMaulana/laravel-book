<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeranjang extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'bukuId' => 'required',
            'pembelianId' => 'required',
            'harga_buku' => 'required|numeric',
            'jumlah_beli' => 'numeric'
        ];
    }
}
