<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $fillable = ['product_id', 'category_id'];

    public function updateRecord($request)
    {
        return $this->updateOrCreate([
            'product_id' => $request->id,
            'category_id' => $request->category_id,
        ], [
            'product_id' => $request->id,
            'category_id' => $request->category_id,
        ]);
    }
}
