<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Recall;
use App\Models\Shop;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->dataAssign['module'] = 'dashboard';
        $this->show_url_in_list[] = ['column_name' => 'ref_url' , 'column_data' => 'ref_url'];
        $this->actions = ['view', 'recall'];
    }

    public function dashboard()
    {
        if (auth()->user()->role == 'admin') {
            $store_model = new Shop();
            $data['module'] = $this->dataAssign['module'];
            //$data['data_table_columns'] = $this->recall_model->getColumnsForDataTable();
            $data['route_name_for_listing'] = $data['module'] . '.ajaxListing';
            $data['total_shops'] = $store_model::all()->count();
            $data['active_shops'] = $store_model::where('is_active', '1')->count();
            $data['inactive_shops'] = $store_model::where('is_active', '0')->count();
            return view($this->layout_base . '.' . $this->dataAssign['module'] . '.show', $data);
        }
        if (auth()->user()->role == 'store') {
            $data['module'] = $this->dataAssign['module'];
          //  $data['data_table_columns'] = $this->recall_model->getColumnsForDataTable();
            $data['route_name_for_listing'] = $data['module'] . '.storeAjaxListing';
            return view($this->layout_base . '.' . $this->dataAssign['module'] . '.show', $data);
        }
        if (auth()->user()->role == 'agent') {
            return redirect('customer-information');
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
