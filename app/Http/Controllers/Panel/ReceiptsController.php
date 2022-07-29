<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Receipt\StoreRecord;
use App\Http\Requests\Receipt\UpdateRecord;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\ReceiptDetail;
use App\Models\Shop;
use Illuminate\Http\Request;

class ReceiptsController extends Controller
{
    //
    public function __construct()
    {
        $this->primary_model = new Receipt();
        $this->detail_model = new ReceiptDetail();
        $this->shop_model = new Shop();
        $this->customer_model = new Customer();
        $this->product_model = new Product();
        $this->dataAssign['module'] = 'receipts';
        $this->actions = ['view', 'edit'];
        $this->show_toggle_in_list[] = ['column_name' => 'is_delivered', 'column_data' => 'is_delivered'];
        $this->hasRawCodeColumn = ['total', 'advance_payment', 'remaining_payment', 'created_at'];
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
        $this->dataAssign['shops'] = $this->shop_model->getRecords();
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function store(StoreRecord $storeRecord)
    {
        if (!is_numeric($storeRecord->customer_id) || $storeRecord->customer_id == 'new') {
            $customer = $this->customer_model->createRecord($storeRecord);
            $storeRecord->merge(['customer_id' => $customer->id]);
        }
        $record = $this->primary_model->createRecord($storeRecord);
        $storeRecord->merge(['id' => $record->id]);
        $this->detail_model->updateRecord($storeRecord);
        // $this->primary_model->updateDetails($record);
        return $record;
    }

    public function edit($id)
    {
        $this->dataAssign['shops'] = $this->shop_model->getRecords();
        $this->dataAssign['data'] = $this->primary_model->findRecord($id);
        $this->dataAssign['customers'] = $this->customer_model->getRecords($this->dataAssign['data']->shop_id);
        $this->dataAssign['products'] = $this->product_model->getRecords($this->dataAssign['data']->shop_id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function update(UpdateRecord $updateRecord)
    {
        $record = $this->primary_model->updateRecord($updateRecord);
        $this->detail_model->updateRecord($updateRecord);
//        $this->primary_model->updateDetails($record);
        return $record;
    }

    public function detailRow(Request $request)
    {
        $this->dataAssign['products'] = $this->product_model->getRecords($request->shop_id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.row', $this->dataAssign);
    }

    public function delete($id)
    {
        return $this->primary_model->deleteRecord($id);
    }

    public function deleteDetail($id)
    {
        return $this->detail_model->deleteRecord($id);
    }

    public function updateDelivered($id, $val)
    {
        $this->primary_model->updateDelivered($id, $val);
        return back();
    }

}
