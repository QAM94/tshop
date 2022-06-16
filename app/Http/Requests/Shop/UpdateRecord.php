<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecord extends FormRequest
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
            'name' => 'required|max:99|unique:shops,name,' . $this->id,
            'logo' => 'mimes:jpeg,bmp,png,gif,svg',
            'contact' => 'required|regex:/\+\d{9,12}$/|unique:shops,contact,' . $this->id,
            'address' => 'required|max:255'
        ];
    }
}
