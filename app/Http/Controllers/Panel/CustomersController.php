<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\Customer\StoreRecord;
use App\Http\Requests\Customer\UpdateRecord;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->primary_model = new Customer();
        $this->dataAssign['module'] = 'customers';
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

    public function store(StoreRecord $storeCustomer)
    {
        if (auth()->user()->role == 'agent') {
            $shop_id = auth()->user()->shop_id;
        } else {
            $shop_id = isset(auth()->user()->store->id) ? auth()->user()->store->id : 0;
        }
        $storeCustomer->merge(['shop_id' => $shop_id]);
        return $this->primary_model->create($storeCustomer->only($this->primary_model->getFillable()));
    }

    public function edit($id)
    {
        $this->dataAssign['data'] = $this->primary_model->findOrFail($id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function update(UpdateRecord $updateRecord)
    {
        $customer = $this->primary_model->find($updateRecord->id);
        $customer->update($updateRecord->only($this->primary_model->getFillable()));

        return $customer;
    }

    public function view($id)
    {
        $this->dataAssign['data'] = $this->primary_model->findOrFail($id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function delete($id)
    {
        $data = $this->primary_model->find($id);
        $data->delete();
    }

    protected function ajaxListing()
    {
        $data = $this->primary_model->ajaxListing();
        $module = $this->dataAssign['module'];
        return $this->makeDataTable($data, $this->actions, $module);
    }

    public function customerInformation()
    {
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.agent_customer', $this->dataAssign);
    }

    public function info(Request $request)
    {
        return $this->primary_model->where('email', $request->email)->first();
    }

    public function getByShop(Request $request)
    {
        return $this->primary_model->getRecords($request->shop_id);
    }
}
