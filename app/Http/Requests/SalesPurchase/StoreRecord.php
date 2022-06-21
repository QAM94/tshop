<?php

namespace App\Http\Requests\SalesPurchase;

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
            'shop_id' => 'nullable|exists:shops,id,deleted_at,NULL',
            'product_id' => 'nullable|exists:products,id,deleted_at,NULL',
            'type' => 'required|in:sale,purchase',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ];
    }
}
