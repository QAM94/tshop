<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Receipt;
use App\Models\ReceiptDetail;
use App\Models\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->dataAssign['module'] = 'dashboard';
        $this->shop_model = new Shop();
        $this->receipt_model = new ReceiptDetail();
    }

    public function dashboard(Request $request)
    {
        $range = 0;
        if (!empty($request->start) && !empty($request->end)) {
            $range = 1;
        }
        if (auth()->user()->role == 'admin') {
            $data['module'] = $this->dataAssign['module'];
            $rangeArr = [];
            if (!empty($request->start) && !empty($request->end)) {
                $rangeArr = [$request->start, $request->end];
                $data['total_sales'] = Receipt::whereNull('deleted_at')->where(['is_active' => 1])
                    ->whereBetween('created_at', $rangeArr)
                    ->sum('total');
                $data['net_sales'] = Receipt::whereNull('deleted_at')->where(['is_active' => 1])
                    ->whereBetween('created_at', $rangeArr)
                    ->sum('sub_total');
                $data['total_orders'] = Receipt::whereNull('deleted_at')->where(['is_active' => 1])
                    ->whereBetween('created_at', $rangeArr)
                    ->count();
                $data['total_items_sold'] = Receipt::whereNull('deleted_at')->where(['is_active' => 1])
                    ->whereBetween('created_at', $rangeArr)
                    ->sum('items_sold_qty');
            } else {
                $data['total_sales'] = Receipt::whereNull('deleted_at')->where(['is_active' => 1])
                    ->sum('total');
                $data['net_sales'] = Receipt::whereNull('deleted_at')->where(['is_active' => 1])
                    ->sum('sub_total');
                $data['total_orders'] = Receipt::whereNull('deleted_at')->where(['is_active' => 1])
                    ->count();
                $data['total_items_sold'] = Receipt::whereNull('deleted_at')->where(['is_active' => 1])
                    ->sum('items_sold_qty');
            }

            $data['data_table_items'] = $this->receipt_model->getItemsTableData($rangeArr);
            $data['data_table_shops'] = $this->shop_model->getDashboardTableData();
            $data['route_name_for_listing'] = $data['module'] . '.ajaxListing';
            return view($this->layout_base . '.' . $this->dataAssign['module'] . '.show', $data);
        }
        if (auth()->user()->role == 'store') {
            $data['module'] = $this->dataAssign['module'];
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
        if (Auth::check()) {
            return User::find(Auth::id())->is_logout;
        }
        return 1;
    }
}
