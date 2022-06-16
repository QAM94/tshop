<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShopUser extends Model
{

    protected $fillable = ['shop_id', 'user_id'];

    public $timestamps = FALSE;

    public function shop() {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function updateRecord($request)
    {
        $this->updateOrCreate([
            'user_id' => $request->id
        ], [
            'user_id' => $request->id,
            'shop_id' => $request->shop_id
        ]);
    }
}
