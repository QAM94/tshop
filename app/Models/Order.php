<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['receipt_id', 'batch_id', 'product', 'quantity', 'price', 'status'];

    public function storeOrder($request)
    {
        $products = json_decode($request->products, true);
        foreach ($products as $product) {
            $this->create([
                'receipt_id' => $request->receipt_id,
                'batch_id' => $product['batch_id'],
                'product' => $product['product'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }
        $data = $this->where('receipt_id', $request->receipt_id)->get();
        return makeClientHappy($data, "Record(s) Inserted Successfully");
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'receipt_id', 'receipt_id');
    }

    public function getRecipients($batch_id)
    {
        return $this->whereHas('customer.store')->with(['customer.store'])->where('batch_id', $batch_id)->get();
    }
}
