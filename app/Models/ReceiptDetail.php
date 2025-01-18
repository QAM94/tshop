<?php

namespace App\Models;

use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use DB;

class ReceiptDetail extends Model
{

    protected $fillable = ['receipt_id', 'product_id', 'yards', 'price', 'unit', 'items_sold'];

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
                    'yards' => $request['yards'][$key],
                    'items_sold' => $request['items_sold'][$key],
                    'unit_price' => $request['unit_price'][$key],
                    'price' => $request['price'][$key]
                ]);
                Inventory::updateStock($val, $request['yards'][$key]);
                $sale_model = new SalesPurchase();
                $sale_model->createSale($product, $request['yards'][$key]);
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
        Inventory::updateStock($data->product_id, $data->yards, 'purchase');
        $data->delete();

        return $id;
    }

    public function getItemsTableData($rangeArr)
    {
        $query = DB::table('receipt_details')
            ->join('receipts', 'receipts.id', '=', 'receipt_details.receipt_id')
            ->join('products', 'products.id', '=', 'receipt_details.product_id')
            ->whereNull('receipts.deleted_at')->where(['receipts.is_active' => 1])
            ->select('products.title', DB::raw('count(receipts.items_sold_qty) AS items_sold'),
                DB::raw('SUM(receipts.total) AS net_sales'));
        if (!empty($rangeArr)) {
            $query->whereBetween('receipts.created_at', $rangeArr);
        }
        $query->groupBy('receipt_details.product_id')->orderBy('items_sold', 'DESC')->limit(5);
        return $query->get();
    }
}
