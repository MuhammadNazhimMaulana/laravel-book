<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegister extends FormRequest
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
            'username' => 'required|min:3|max:255',
            'first_name' => 'required',
            'last_name' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'password' => 'required|min:5|max:255',
        ];
    }
}
