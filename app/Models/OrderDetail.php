<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;

    protected $fillable = ['order_id', 'product', 'quantity', 'price'];

    public function saveDetails($request, $id)
    {
        $products = json_decode($request->products);
        foreach ($products as $key => $item) {
            $this->create([
                'order_id' => $id,
                'product' => $products['title'],
                'quantity' => $products['quantity'],
                'price' => $products['price']
            ]);
        }
    }

    public function detachRoles($id)
    {
        $this->where('order_id', $id)->delete();

        return $id;
    }
}
