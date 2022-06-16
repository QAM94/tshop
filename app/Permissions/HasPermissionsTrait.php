<?php

namespace App\Permissions;

use App\Models\SystemRole;
use Illuminate\Support\Facades\Auth;

trait HasPermissionsTrait
{

    public function roles()
    {
        return $this->belongsTo(SystemRole::class, 'role', 'slug');

    }

    public function hasPermission($slug, $role, $key)
    {
        $authorized = 0;

        $query = $this->where('role', $role)
            ->with(["roles.permissions" => function ($q) use ($slug, $role) {
                $q->where('system_role_permissions.system_module', $slug);
            }]);

        if ($query->count() > 0) {
            foreach ($query->get() as $value) {
                if ($value->roles->permissions->isNotEmpty()) {
                    foreach ($value->roles->permissions as $permission) {
                        $authorized = $permission->{$key};
                    }
                }
            }
        }

        return $authorized;
    }
}
