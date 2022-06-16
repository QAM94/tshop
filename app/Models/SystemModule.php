<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemModule extends Model
{
    public function hasChildren($id)
    {
        return (bool)$this->where('parent', $id)->count();
    }

    public function children()
    {
        return $this->hasMany(SystemModule::class, 'parent_id')
            ->where('is_active', 1);
    }
}
