<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemRolePermission extends Model
{
    protected $fillable = ['system_role', 'system_module', 'add', 'edit', 'delete', 'view', 'is_visible'];

    public function attachRoles($request, $slug)
    {
        $this->where('system_role', $slug)->delete();
        foreach ($request->add as $key => $item) {

            $this->create([
                'system_role' => $slug,
                'system_module' => $key,
                'add' => $item,
                'edit' => $request->edit[$key],
                'delete' => $request->delete[$key],
                'view' => $request->view[$key],
                'is_visible' => $request->is_visible[$key]
            ]);
        }
    }

    public function detachRoles($slug)
    {
        $this->where('system_role', $slug)->delete();

        return $slug;
    }
}
