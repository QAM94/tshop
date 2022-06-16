<?php

namespace App\Http\Requests\Category;

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
            'title' => 'nullable|unique:categories,title,'.$this->id.',id,deleted_at,NULL|max:99',
            'parent_id' => 'nullable|exists:categories,id,deleted_at,NULL'
        ];
    }
}
