<?php

namespace App\Http\Requests\Customer;

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
            'phone_number' => 'required|regex:/\+\d{9,12}$/',
            'email' => 'nullable|email',
            'name' => 'required|max:99',
            'receipt_id' => 'required|min:6|max:16|regex:/^[a-zA-Z0-9\-]*$/'
        ];
    }
}
