<?php

namespace App\Models;

use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Product extends Model
{
    use SoftDeletes, EloquentJoin;

    protected $fillable = ['shop_id', 'sku', 'title', 'slug', 'description', 'price', 'is_active'];

    protected $with = ['inventory'];

    public function categories()
    {
        return $this->hasManyThrough(Category::class, CategoryProduct::class, 'product_id', 'id', 'id', 'category_id');
    }

    public function category()
    {
        return $this->hasOneThrough(Category::class, CategoryProduct::class, 'product_id', 'id', 'id', 'category_id');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'product_id');
    }

    public function shop() {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('title', 'like', '%' . $value . '%');
    }

    public function getColumnsForDataTable()
    {
        $data = [];
        if(!isset(auth()->user()->store->id)) {
            $data[] = ['data' => 'shop.name', 'name' => 'shop.name', 'title' => 'Shop'];
        }
        array_push($data,
            ['data' => 'category.title', 'name' => 'category.title', 'title' => 'Category'],
            ['data' => 'sku', 'name' => 'sku', 'title' => 'SKU'],
            ['data' => 'title', 'name' => 'title', 'title' => 'Name'],
            ['data' => 'inventory.quantity', 'name' => 'inventory.quantity', 'title' => 'Quantity'],
            ['data' => 'price', 'name' => 'price', 'title' => 'Price'],
            ['data' => 'is_active', 'name' => 'is_active', 'title' => 'Is Active?', 'searchable' => 'false', 'nosort' => 'true'],
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
        return $this->query()->with(['category','shop']);
    }

    public function findRecord($id)
    {
        return $this->with(['category'])->find($id);
    }

    public function createRecord($request)
    {
        $request->merge(['slug' => Str::slug('title')]);
        return $this->create($request->only($this->getFillable()));
    }

    public function updateRecord($request)
    {
        $record = $this->find($request->id);
        $request->merge(['slug' => Str::slug('title')]);
        $record->update($request->only($this->getFillable()));
        return $record;
    }

    public function deleteRecord($id)
    {
        $data = $this->findOrFail($id);
        $data->delete();

        return $id;
    }

    public function getRecords($shop_id = null, $in_stock = 1)
    {
        $query = $this->where('is_active', 1);
        if (!empty($shop_id)) {
            $query->where('shop_id', $shop_id);
        }
        if ($in_stock) {
            $query->whereHas('inventory', function ($q){
                $q->where('quantity', '>', 0);
            });
        }
        return $query->get();
    }
}
