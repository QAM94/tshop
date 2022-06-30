<?php

namespace App\Models;

use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class ReceiptDetail extends Model
{

    protected $fillable = ['receipt_id', 'product_id', 'quantity', 'price', 'unit', 'description'];

    public $timestamps = FALSE;

    public function receipt()
    {
        return $this->belongsTo(Receipt::class, 'receipt_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function updateRecord($request)
    {
        $product_model = new Product();
        if (empty($request['product_id'])) {
            return false;
        }
        foreach ($request['product_id'] as $key => $val) {
            $product = $product_model->findRecord($val);
            if ($val > 0) {
                $this->updateOrCreate([
                    'receipt_id' => $request->id,
                    'product_id' => $val,
                ], [
                    'quantity' => $request['quantity'][$key],
                    'unit_price' => $request['unit_price'][$key],
                    'price' => $request['price'][$key],
                    'description' => $request['description'][$key]
                ]);
                Inventory::updateQty($val, $request['quantity'][$key]);
                $sale_model = new SalesPurchase();
                $sale_model->createSale($product, $request['quantity'][$key]);
            }
        }
    }

    public function getTotal($receipt_id)
    {
        return $this->where(['receipt_id' => $receipt_id])->sum('price');
    }

    public function deleteRecord($id)
    {
        $data = $this->findOrFail($id);
        $inventory = Inventory::where(['product_id' => $data->product_id])->first();
        $inventory->length = $inventory->length + $data->quantity;
        $inventory->save();
        $data->delete();

        return $id;
    }
}
