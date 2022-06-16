<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecord extends FormRequest
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
            'name' => 'required|unique:shops,name|max:99',
            'email' => 'required|email|unique:users,email|max:99',
            'logo' => 'mimes:jpeg,bmp,png,gif,svg',
            'contact' => 'required|unique:shops,contact|regex:/\+\d{9,12}$/',
            'address' => 'required|max:255'
        ];
    }
}
