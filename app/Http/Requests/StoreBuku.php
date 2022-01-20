<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBuku extends FormRequest
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
            'hargaId' => 'required',
            'genreId' => 'required',
            'penulisId' => 'required',
            'judul_buku' => 'required',
            'jumlah_halaman' => 'required',
            'tanggal_publikasi' => 'required',
        ];
    }
}
