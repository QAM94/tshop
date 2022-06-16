<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agent\StoreAgent;
use App\Http\Requests\Agent\UpdateAgent;
use App\User;
use Illuminate\Support\Facades\Hash;

class AgentsController extends Controller
{
    public function __construct()
    {
        $this->primary_model = new User();
        $this->dataAssign['module'] = 'cashier';
        $this->dataAssign['route_name_for_listing'] = $this->dataAssign['module'] . '.ajaxListing';
        $this->dataAssign['data_table_columns'] = $this->primary_model->getColumnsForShopDataTable();
    }

    public function show()
    {
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function add()
    {
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function store(StoreAgent $storeAgent)
    {
        $storeAgent->merge([
            'shop_id' => isset(auth()->user()->store->id) ? auth()->user()->store->id : 0,
            'role' => 'agent',
            'password' => Hash::make($storeAgent->password)
        ]);

        return $this->primary_model->create($storeAgent->only($this->primary_model->getFillable()));
    }

    public function edit($id)
    {
        $this->dataAssign['data'] = $this->primary_model->findOrFail($id);

        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function update(UpdateAgent $updateAgent)
    {
        if ($updateAgent->filled('password')) {

            $updateAgent->merge([
                'password' => Hash::make($updateAgent->password)
            ]);
        } else {
            $updateAgent->request->remove('password');
        }

        $agent = $this->primary_model->find($updateAgent->id);

        $agent->update($updateAgent->only($this->primary_model->getFillable()));

        return $agent;

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
        $data = $this->primary_model->agentAjaxListing();

        $module = $this->dataAssign['module'];

        return $this->makeDataTable($data, $this->actions, $module);
    }

    public function logout()
    {

        $agents = $this->primary_model
            ->where('shop_id', isset(auth()->user()->store->id) ? auth()->user()->store->id : 0)
            ->get();

        foreach ($agents as $agent) {
            $agent->update(['is_logout' => 1]);
        }

        return back();
    }
}
