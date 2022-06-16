<?php

namespace App\Http\Requests\Product;

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
            'shop_id' => 'nullable|exists:shops,id,deleted_at,NULL',
            'sku' => 'required|unique:products,sku,'.$this->id.',id,deleted_at,NULL|max:99',
            'title' => 'required|unique:products,title,'.$this->id.',id,deleted_at,NULL|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric|max:1000000',
            'quantity' => 'required|numeric|max:100000',
            'measure' => 'required|numeric|max:10'
        ];
    }
}
