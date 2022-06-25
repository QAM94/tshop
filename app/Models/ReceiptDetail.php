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
            if($val > 0) {
                $this->updateOrCreate([
                    'receipt_id' => $request->id,
                    'product_id' => $val,
                ], [
                    'quantity' => $request['quantity'][$key],
                    'unit_price' => $request['unit_price'][$key],
                    'price' => $request['unit_price'][$key] * $request['quantity'][$key]
                ]);
                Inventory::updateQty($val, $request['quantity'][$key]);
                $sale_model = new SalesPurchase();
                $sale_model->createSale($product, $request['quantity'][$key]);
            }
        }
    }

    public function getTotal($receipt_id) {
        return $this->where(['receipt_id' => $receipt_id])->sum('price');
    }
}
