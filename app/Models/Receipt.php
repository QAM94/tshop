<?php

namespace App\Models;

use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Receipt extends Model
{
    use SoftDeletes, EloquentJoin;

    protected $fillable = ['receipt_no', 'shop_id', 'customer_id', 'sub_total', 'discount', 'vat',
        'total', 'advance_payment', 'remaining_payment', 'description', 'own_cloth', 'items_sold_qty',
        'is_delivered', 'is_active'];

    protected $with = ['details'];

    protected  $appends = ['items_sold', 'own'];

    public function getItemsSoldAttribute() {
        return $this->items_sold_qty + $this->details->sum('items_sold');
    }

    public function getOwnAttribute() {
        return $this->own_cloth ? 'Yes' : 'No';
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function details()
    {
        return $this->hasMany(ReceiptDetail::class, 'receipt_id', 'id');
    }

    public function getColumnsForDataTable()
    {
        $data[] = ['data' => 'receipt_no', 'name' => 'receipt_no', 'title' => 'Receipt No'];
        if (!isset(auth()->user()->store->id)) {
            $data[] = ['data' => 'shop.name', 'name' => 'shop.name', 'title' => 'Shop'];
        }
        array_push($data,
            ['data' => 'customer.name', 'name' => 'customer.name', 'title' => 'Customer'],
            ['data' => 'customer.phone_number', 'name' => 'customer.phone_number', 'title' => 'Customer Contact'],
            ['data' => 'total', 'name' => 'total', 'title' => 'Amount'],
            ['data' => 'advance_payment', 'name' => 'advance_payment', 'title' => 'Advance'],
            ['data' => 'remaining_payment', 'name' => 'remaining_payment', 'title' => 'Remaining'],
            ['data' => 'own', 'name' => 'own', 'title' => 'Own Cloth?'],
            ['data' => 'items_sold', 'name' => 'items_sold', 'title' => 'Items Sold'],
            ['data' => 'is_delivered', 'name' => 'is_delivered', 'title' => 'Delivery', 'searchable' => 'false', 'nosort' => 'true'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'Action', 'searchable' => 'false', 'nosort' => 'true']
        );

        return json_encode($data);
    }

    public function orderArray()
    {
        return [
            ['name' => 'category.title', 'relationship' => ['model' => 'category', 'column_name' => 'title']],
            ['name' => 'title'],
            ['name' => 'price']
        ];
    }

    public function ajaxListing()
    {
        return $this->query()->with(['shop', 'customer']);
    }

    public function findRecord($id)
    {
        return $this->with(['shop', 'customer'])->find($id);
    }

    public function createRecord($request)
    {
        return $this->create($request->only($this->getFillable()));
    }

    public function updateRecord($request)
    {
        $record = $this->find($request->id);
        $record->update($request->only($this->getFillable()));
        return $record;
    }

    public function deleteRecord($id)
    {
        $data = $this->findOrFail($id);
        $data->delete();

        return $id;
    }

    public function getRecords()
    {
        return $this->where('is_active', 1)->get();
    }

    public function updateDetails($record)
    {
        $detail_model = new ReceiptDetail();
        $record->sub_total = $detail_model->getTotal($record->id);
        $record->total = $record->sub_total - $record->discount + $record->vat;
        $record->save();
    }

    public function updateDelivered($id, $val)
    {
        $record = $this->find($id);
        $record->is_delivered = $val;
        $record->save();
        return $record;
    }
}
