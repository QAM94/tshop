<?php

namespace App\Http\Requests\User;

use App\Rules\PhoneNumber;
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
            'name' => 'required|regex:/^[a-zA-Z\s\.]*$/|max:99',
            'email' => 'required|email|unique:users,email,'.$this->id.',id,deleted_at,NULL|max:99',
            'contact' => 'nullable|regex:/^[\+]?[0-9]{10,12}$/',
            'shop_id' => 'required|exists:shops,id',
            'image' => 'mimes:jpg,jpeg,bmp,png,gif,svg'
        ];
    }
}
