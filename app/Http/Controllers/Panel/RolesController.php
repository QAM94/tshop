<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\Role\StoreRecord;
use App\Http\Requests\Role\UpdateRecord;
use App\Http\ViewComposer\SidebarComposer;
use App\Models\SystemRole;
use App\Models\SystemRolePermission;
use App\Http\Controllers\Controller;
use App\User;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->primary_model = new SystemRole();
        $this->modules = new SidebarComposer();
        $this->user_model = new User();
        $this->permission_model = new SystemRolePermission();
        $this->dataAssign['module'] = 'roles';
        $this->actions = ['edit'];
        $this->dataAssign['route_name_for_listing'] = $this->dataAssign['module'] . '.ajaxListing';
        $this->dataAssign['data_table_columns'] = $this->primary_model->getColumnsForDataTable();

    }

    public function show()
    {
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function add()
    {
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function store(StoreRecord $storeRecord)
    {
        $slug = $this->primary_model->createRecord($storeRecord);

        $this->permission_model->attachRoles($storeRecord, $slug);

        return $slug;
    }


    public function edit($id)
    {

        $this->dataAssign['modules'] = $this->modules->getModuleList();

        $this->dataAssign['data'] = $this->primary_model->editRole($id);

        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function update(UpdateRecord $updateRecord)
    {
        $this->primary_model->updateRole($updateRecord);

        $this->permission_model->attachRoles($updateRecord, $updateRecord->slug);

        return $updateRecord->id;
    }

    public function delete($slug)
    {
        $this->user_model->deleteUserIfRoleIsDeleted($slug);

        $this->permission_model->detachRoles($slug);

        $this->primary_model->deleteRole($slug);

        return $slug;
    }

    protected function ajaxListing()
    {
        $data = $this->primary_model->ajaxListing();

        $module = $this->dataAssign['module'];

        return $this->makeDataTable($data, $this->actions, $module);
    }
}
