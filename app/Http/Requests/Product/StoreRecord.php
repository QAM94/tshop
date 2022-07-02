<?php

namespace App\Http\Requests\Product;

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
            'shop_id' => 'required|exists:shops,id',
            'sku' => 'nullable|max:99',
            'title' => 'required|max:255',
            'description' => 'nullable|max:255',
            'price' => 'nullable|numeric|max:1000000',
            'quantity' => 'required|numeric|max:1000000',
            'length' => 'required|numeric|max:100'
        ];
    }
}
