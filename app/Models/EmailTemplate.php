<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTemplate extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['shop_id', 'subject', 'message'];

    public function getColumnsForDataTable()
    {
        $data = [
            ['data' => 'subject', 'name' => 'subject'],
            ['data' => 'message', 'name' => 'message'],
            ['data' => 'actions', 'name' => 'actions', 'searchable' => 'false'],
            ['data' => 'created_at', 'name' => 'created_at', 'visible' => false]
        ];

        return json_encode($data);
    }

    public function ajaxListing()
    {
        return $this->where('shop_id', isset(auth()->user()->store->id) ? auth()->user()->store->id : 0);
    }
}
