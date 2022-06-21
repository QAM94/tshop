<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesPurchase\StoreRecord;
use App\Http\Requests\SalesPurchase\UpdateRecord;
use App\Models\Product;
use App\Models\SalesPurchase;
use App\Models\Shop;
use Illuminate\Http\Request;

class SalesPurchaseController extends Controller
{
    //
    /**
     * @var SalesPurchase
     */
    private $primary_model;
    /**
     * @var Shop
     */
    private $shop_model;
    /**
     * @var Product
     */
    private $product_model;

    public function __construct()
    {
        $this->primary_model = new SalesPurchase();
        $this->shop_model = new Shop();
        $this->product_model = new Product();
        $this->dataAssign['module'] = 'sales-purchase';
        $this->actions = ['view', 'edit'];
        $this->dataAssign['route_name_for_listing'] = $this->dataAssign['module'] . '.ajaxListing';
        $this->dataAssign['data_table_columns'] = $this->primary_model->getColumnsForDataTable();
    }

    public function show()
    {
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
        return $this->primary_model->createRecord($storeRecord);
    }

    public function edit($id)
    {
        $this->dataAssign['shops'] = $this->shop_model->getRecords();
        $this->dataAssign['data'] = $this->primary_model->findRecord($id);
        $this->dataAssign['products'] = $this->product_model->getRecords($this->dataAssign['data']->shop_id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function update(UpdateRecord $updateRecord)
    {
        return $this->primary_model->updateRecord($updateRecord);
    }

    public function detailRow(Request $request)
    {
        $this->dataAssign['products'] = $this->product_model->getRecords($request->shop_id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.row', $this->dataAssign);
    }

}
