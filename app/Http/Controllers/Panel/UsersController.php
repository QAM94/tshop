<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\User\StoreRecord;
use App\Http\Requests\User\UpdateRecord;
use App\Models\Shop;
use App\Models\ShopUser;
use App\Models\Upload;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->primary_model = new User();
        $this->shop_model = new Shop();
        $this->shop_user_model = new ShopUser();
        $this->upload_model = new Upload();
        $this->dataAssign['module'] = 'users';
        $this->dataAssign['route_name_for_listing'] = $this->dataAssign['module'] . '.ajaxListing';
        $this->dataAssign['data_table_columns'] = $this->primary_model->getColumnsForDataTable();

    }

    public function show()
    {
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function add()
    {
        $this->dataAssign['shops'] = $this->shop_model->getRecords();
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function store(StoreRecord $storeRecord)
    {
        $user = $this->primary_model->createRecord($storeRecord);
        $storeRecord->merge(['id' => $user->id]);
        $this->shop_user_model->updateRecord($storeRecord);

        if ($storeRecord->hasFile('image')) {
            $this->upload_model->fileUpload('users', 'user', 'image',
                $user->id, $user->id);
        }
        return back();
    }

    public function edit($id)
    {
        $this->dataAssign['shops'] = $this->shop_model->getRecords();
        $this->dataAssign['data'] = $this->primary_model->findRecord($id);

        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }


    public function update(UpdateRecord $updateRecord)
    {
        $this->primary_model->updateRecord($updateRecord);
        $this->shop_user_model->updateRecord($updateRecord);

        if ($updateRecord->hasFile('image')) {
            $this->upload_model->fileUpload('users', 'user', 'image',
                $updateRecord->id, $updateRecord->id);
        }
        return back();
    }

    public function delete($id)
    {
        return $this->primary_model->deleteRecord($id);
    }

    public function view($id)
    {
        $this->dataAssign['data'] = $this->primary_model->findRecord($id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    protected function ajaxListing()
    {
        $data = $this->primary_model->ajaxListing();
        $module = $this->dataAssign['module'];
        return $this->makeDataTable($data, $this->actions, $module);
    }

    public function changePassword(Request $request)
    {
        return $this->primary_model->changePassword($request);
    }

    public function editProfile()
    {
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__);
    }

    public function updateProfile(UpdateRecord $updateRecord)
    {
        $this->primary_model->updateRecord($updateRecord);
        return redirect()->back()->with('message', 'Profile Updated Successfully!');
    }

    public function editAdminProfile()
    {
        $this->dataAssign['data'] = $this->primary_model->find(auth()->user()->id);
        return view($this->layout_base . '.' . $this->dataAssign['module'] . '.' . __FUNCTION__, $this->dataAssign);
    }

    public function updateAdminProfile(Request $request)
    {
        $this->primary_model->update($request->only($this->primary_model->getFillable()));
        flash('User profile updated', 'success');
        return back();
    }
}
