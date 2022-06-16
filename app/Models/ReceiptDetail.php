<?php

namespace App\Models;

use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ReceiptDetail extends Model
{

    protected $fillable = ['receipt_id', 'product_id', 'quantity', 'price', 'unit'];

    public $timestamps = FALSE;

    public function receipt() {
        return $this->belongsTo(Receipt::class, 'receipt_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function updateRecord($request)
    {
        $product_model = new Product();
        foreach($request['product_id'] as $key => $val) {
            $product = $product_model->findRecord($val);
            $this->updateOrCreate([
                'receipt_id' => $request->id,
                'product_id' => $val,
            ], [
                'quantity' => $request['quantity'][$key],
                'unit_price' => $product->price,
                'unit' => $product->inventory->unit,
                'price' => $product->price * $request['quantity'][$key]
            ]);
            $product->inventory->quantity = $product->inventory->quantity - $request['quantity'][$key];
            $product->inventory->save();
        }
    }

    public function getTotal($receipt_id) {
        return $this->where(['receipt_id' => $receipt_id])->sum('price');
    }
}
