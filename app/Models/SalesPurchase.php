<?php

namespace App\Models;

use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class SalesPurchase extends Model
{
    use SoftDeletes, EloquentJoin;

    protected $fillable = ['shop_id', 'product_id', 'type', 'quantity', 'price', 'is_active'];

    public function shop() {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getColumnsForDataTable()
    {
        $data = [
            ['data' => 'shop.name', 'name' => 'shop.name', 'title' => 'Shop'],
            ['data' => 'product.title', 'name' => 'product.title', 'title' => 'Product'],
            ['data' => 'type', 'name' => 'type', 'title' => 'Type'],
            ['data' => 'quantity', 'name' => 'quantity', 'title' => 'Quantity'],
            ['data' => 'price', 'name' => 'price', 'title' => 'Price'],
            ['data' => 'is_active', 'name' => 'is_active', 'title' => 'Is Active?', 'searchable' => 'false', 'nosort' => 'true'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'Action', 'searchable' => 'false', 'nosort' => 'true']
        ];
        return json_encode($data);
    }

    public function orderArray()
    {
        return [
            ['name' => 'product.title', 'relationship' => ['model' => 'product', 'column_name' => 'title']],
            ['name' => 'title'],
            ['name' => 'price']
        ];
    }

    public function ajaxListing()
    {
        return $this->query()->with(['shop','product']);
    }

    public function findRecord($id)
    {
        return $this->with(['shop','product'])->find($id);
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
}
