<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\StoreRecord;
use App\Http\Requests\Shop\UpdateRecord;
use App\Models\Shop;
use App\User;

class ShopsController extends Controller
{
    public function __construct()
    {
        $this->primary_model = new Shop();
        $this->user_model = new User();
        $this->dataAssign['module'] = 'shops';
        $this->show_status_in_list[] = ['column_name' => 'is_active' , 'column_data' => 'is_active'];
        $this->show_image_in_list[] = ['column_name' => 'avatar' , 'column_data' => 'avatar'];
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
        return $this->primary_model->createRecord($storeRecord);
    }

    public function edit($id)
    {
        $this->dataAssign['data'] = $this->primary_model->editRecord($id);

        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function update(UpdateRecord $updateRecord)
    {
        return $this->primary_model->updateRecord($updateRecord);
    }

    public function delete($id)
    {
        return $this->primary_model->deleteRecord($id);
    }

    protected function ajaxListing()
    {
        $data = $this->primary_model->ajaxListing();

        $module = $this->dataAssign['module'];

        return $this->makeDataTable($data, $this->actions, $module);
    }

    public function editProfile()
    {
        $user = $this->user_model->find(auth()->user()->id);

        $this->dataAssign['data'] = $this->primary_model->find($user->store->id);

        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function updateProfile(UpdateRecord $updateRecord)
    {
        $this->primary_model->updateRecord($updateRecord);

        flash('User profile updated', 'success');

        return back();
    }
}
