<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemRole extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug'];

    public function getColumnsForDataTable()
    {
        $data = [
            ['data' => 'title', 'name' => 'title'],
            ['data' => 'slug', 'name' => 'slug'],
            ['data' => 'is_active', 'name' => 'is_active'],
            ['data' => 'actions', 'name' => 'Actions', 'searchable' => 'false']
        ];

        return json_encode($data);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($system_role) {
            foreach ($system_role->user as $user) {
                $user->delete();
            }

            foreach ($system_role->permissions as $permissions) {
                $permissions->delete();
            }
        });
    }

    public function user()
    {
        return $this->hasMany(User::class, 'role');
    }

    public function permissions()
    {
        return $this->hasMany(SystemRolePermission::class, 'system_role', 'slug');
    }

    public function createRecord($request)
    {
        $request->merge(['slug' => str_slug($request->title)]);

        return $this->create($request->only($this->getFillable()))->slug;
    }

    public function updateRole($request)
    {
        $request->merge(['slug' => str_slug($request->title)]);

        $this->find($request->id)->update($request->only($this->getFillable()));

        return $request->id;
    }

    public function deleteRole($id)
    {
        $this->findOrFail($id)->delete();

        return $id;
    }

    public function editRole($id)
    {
        return $this->with('permissions')->findOrFail($id);
    }

    public function ajaxListing()
    {
        return $this::query();
    }

    public function getAllSystemRoles()
    {
        return $this->where('is_superadmin', null)->get();
    }
}
