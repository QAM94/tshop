<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRecord;
use App\Http\Requests\Product\UpdateRecord;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function __construct()
    {
        $this->primary_model = new Product();
        $this->category_model = new Category();
        $this->category_product_model = new CategoryProduct();
        $this->inventory_model = new Inventory();
        $this->shop_model = new Shop();
        $this->dataAssign['module'] = 'products';
        $this->actions = ['edit'];
        $this->show_status_in_list[] = ['column_name' => 'is_active' , 'column_data' => 'is_active'];
        $this->dataAssign['route_name_for_listing'] = $this->dataAssign['module'] . '.ajaxListing';
        $this->dataAssign['data_table_columns'] = $this->primary_model->getColumnsForDataTable();
    }

    public function show(Request $request)
    {
        $this->dataAssign['shop_id'] = '';
        $this->dataAssign['shops'] = $this->shop_model->getRecords();
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function showByShop(Request $request)
    {
        $this->dataAssign['shop_id'] = $request->shop_id;
        $this->dataAssign['route_name_for_listing'] = [
            'route' => $this->dataAssign['module'] . '.ajaxListing',
            'key' => 'shop_id',
            'value' => $request->shop_id
        ];
        $this->dataAssign['shops'] = $this->shop_model->getRecords();
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.show', $this->dataAssign);
    }

    protected function ajaxListing(Request $request)
    {
        $data = $this->primary_model->ajaxListing($request);
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
        $this->dataAssign['categories'] = $this->category_model->getSubCategories();
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function store(StoreRecord $storeRecord)
    {
        $product = $this->primary_model->createRecord($storeRecord);
        $storeRecord->merge(['id' => $product->id]);
        $this->category_product_model->updateRecord($storeRecord);
        $this->inventory_model->updateRecord($storeRecord);
        return $product;
    }

    public function edit($id)
    {
        $this->dataAssign['shops'] = $this->shop_model->getRecords();
        $this->dataAssign['categories'] = $this->category_model->getSubCategories();
        $this->dataAssign['data'] = $this->primary_model->findRecord($id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function update(UpdateRecord $updateRecord)
    {
        $product = $this->primary_model->updateRecord($updateRecord);
        $this->category_product_model->updateRecord($updateRecord);
        $this->inventory_model->updateRecord($updateRecord);
        return $product;
    }

    public function getByShop(Request $request)
    {
        return $this->primary_model->getRecords($request->shop_id);
    }
}
