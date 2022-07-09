<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Shop;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->dataAssign['module'] = 'dashboard';
        $this->shop_model = new Shop();
    }

    public function dashboard()
    {
        if (auth()->user()->role == 'admin') {
            $data['module'] = $this->dataAssign['module'];
            $data['total_shops'] = Shop::where('is_active', '1')->count();
            $data['total_users'] = User::where(['role' => 'shop', 'is_active' => '1'])->count();
            $data['total_customers'] = Customer::count();
            $data['data_table_shops'] = $this->shop_model->getDashboardTableData();
            $data['route_name_for_listing'] = $data['module'] . '.ajaxListing';
            return view($this->layout_base . '.' . $this->dataAssign['module'] . '.show', $data);
        }
        if (auth()->user()->role == 'store') {
            $data['module'] = $this->dataAssign['module'];
          //  $data['data_table_columns'] = $this->recall_model->getColumnsForDataTable();
            $data['route_name_for_listing'] = $data['module'] . '.storeAjaxListing';
            return view($this->layout_base . '.' . $this->dataAssign['module'] . '.show', $data);
        }


    }

    protected function ajaxListing()
    {
        $data = $this->recall_model->ajaxListing();

        $module = $this->dataAssign['module'];

        return $this->makeDataTable($data, $this->actions, $module);
    }

    protected function storeAjaxListing()
    {
        $request = app('request');

        if ($request->has('search_by')) {
            $data = $this->recall_model->searchStoreAjaxListing($request->search_by);
        } else {
            $data = $this->recall_model->storeAjaxListing();
        }
        $module = $this->dataAssign['module'];

        return $this->makeDataTable($data, $this->actions, $module);
    }

    public function view($id)
    {
        $this->dataAssign['data'] = $this->recall_model->findOrFail($id);

        return view($this->layout_base . '.current_recalls.' . __FUNCTION__, $this->dataAssign);
    }

    public function sendRecall($id)
    {
        $this->dataAssign['data'] = $this->recall_model->sendStoreRecall($id);

        return view($this->layout_base . '.current_recalls.' . __FUNCTION__, $this->dataAssign);
    }

    public function checkAuth()
    {
        if(Auth::check()){
            return User::find(Auth::id())->is_logout;
        }
        return 1;
    }
}
