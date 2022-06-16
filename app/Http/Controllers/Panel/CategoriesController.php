<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRecord;
use App\Http\Requests\Category\UpdateRecord;
use App\Models\Category;
use App\Models\Module;
use App\Models\Product;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
        $this->primary_model = new Category();
        $this->dataAssign['_model'] = $this->primary_model;
        $this->dataAssign['module'] = 'categories';
        $this->actions = ['edit'];
        $this->show_status_in_list[] = ['column_name' => 'is_active' , 'column_data' => 'is_active'];
        $this->dataAssign['route_name_for_listing'] = $this->dataAssign['module'] . '.ajaxListing';
        $this->dataAssign['data_table_columns'] = $this->primary_model->getColumnsForDataTable();
    }

    public function show()
    {
        $this->dataAssign['type'] = '';
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    protected function ajaxListing()
    {
        $data = $this->primary_model->ajaxListing();
        $module = $this->dataAssign['module'];
        return $this->makeDataTable($data, $this->actions, $module);
    }

    public function view($id)
    {
        $this->dataAssign['data'] = $this->primary_model->findRecord($id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function add()
    {
        $this->dataAssign['categories'] = $this->primary_model->getRecords();
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function store(StoreRecord $storeRecord)
    {
        return $this->primary_model->createRecord($storeRecord);
    }

    public function edit($id)
    {
        $this->dataAssign['categories'] = $this->primary_model->getRecords();
        $this->dataAssign['data'] = $this->primary_model->findRecord($id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function update(UpdateRecord $updateRecord)
    {
        return $this->primary_model->updateRecord($updateRecord);
    }
}
