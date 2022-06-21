<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['phone_number', 'email', 'name', 'shop_id'];

    public function getColumnsForDataTable()
    {
        $data = [];
        if(!isset(auth()->user()->store->id)) {
            $data[] = ['data' => 'shop.name', 'name' => 'shop.name', 'title' => 'Shop'];
        }
        array_push($data,
            ['data' => 'name', 'name' => 'name'],
            ['data' => 'email', 'name' => 'email'],
            ['data' => 'phone_number', 'name' => 'phone_number'],
            ['data' => 'actions', 'name' => 'actions', 'searchable' => 'false'],
            ['data' => 'created_at', 'name' => 'created_at', 'visible' => false]);

        return json_encode($data);
    }

    public function ajaxListing()
    {
        if(isset(auth()->user()->store->id)) {
            return $this->query()->with(['shop'])
                ->where('shop_id', isset(auth()->user()->store->id))->get();
        }
        return $this->query()->with(['shop']);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function getRecords($shop_id = null)
    {
        if (!empty($shop_id)) {
            return $this->where('shop_id', $shop_id)->get();
        }
        return $this->all();
    }

    public function createRecord($request)
    {
        $shop_id = isset(auth()->user()->store->id) ? auth()->user()->store->id : $request->shop_id;
        $request->merge(['shop_id' => $shop_id]);
        return $this->create($request->only($this->getFillable()));
    }
}
