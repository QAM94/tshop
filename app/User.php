<?php

namespace App;

use App\Models\Shop;
use App\Models\ShopUser;
use App\Models\Upload;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'contact', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getColumnsForDataTable()
    {
        $data = [
            ['data' => 'role', 'name' => 'role'],
            ['data' => 'name', 'name' => 'name'],
            ['data' => 'email', 'name' => 'email'],
            ['data' => 'contact', 'name' => 'contact'],
            ['data' => 'is_active', 'name' => 'is_active'],
            ['data' => 'actions', 'name' => 'Actions', 'searchable' => 'false']
        ];
        return json_encode($data);
    }

    public function getColumnsForShopDataTable()
    {
        $data = [
            ['data' => 'name', 'name' => 'name'],
            ['data' => 'email', 'name' => 'email'],
            ['data' => 'actions', 'name' => 'Actions', 'searchable' => 'false']
        ];
        return json_encode($data);
    }

    public function createRecord($request)
    {
        $upload_model = new Upload();

        $request->merge(['password' => Hash::make($request->password)]);
        $user = $this->create($request->only($this->getFillable()));
        if ($request->hasFile('image')) {
            $upload_model->fileUpload('users', 'user', 'image', $user->id, $user->id, $user->name);
        }
        $email_data = ['temp' => 'user_registration', 'to' => $request->email,
            'subject' => 'Welcome to RecallSafe',
            'data' => ['user' => $request->name, 'email' => $request->email, 'password' => $request->password]];
        //sendEmail($email_data);
        return $user;
    }

    public function updateRecord($request)
    {
        $user = $this->find($request->id);
        if(!empty($request->password)) {
            $request->merge(['password' => Hash::make($request->password)]);
        }
        else{
            $request->request->remove('password');
        }
        $user->update($request->only($this->getFillable()));

        if ($request->hasFile('image')) {
            $upload_model = new Upload();
            $upload_model->fileUpload('users', 'user', 'image', $user->id, $user->id, $user->name);
        }
        return $user->id;
    }

    public function avatar()
    {
        return $this->hasOne(Upload::class, 'model_ref_id', 'id')
            ->where('uploads.ref_name', 'user');
    }

    public function ajaxListing()
    {
        return $this::query();
    }

    public function shopAjaxListing()
    {
        return $this->where('shop_id', isset(auth()->user()->store->id) ? auth()->user()->store->id : 0)
            ->where('role', 'shop');
    }

    public function shop()
    {
        return $this->hasOneThrough(Shop::class, ShopUser::class, 'user_id', 'id', 'id', 'shop_id');
    }

    public function updatePassword($password)
    {
        $this->where('id', Auth()->user()->id)->update(['password' => Hash::make($password)]);
    }

    public function changePassword($request)
    {
        $user = $this->find(Auth()->user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $password = Hash::make($request->new_password);
            $user->password = $password;
            $user->save();

            return makeClientHappy('Password Changed Successfully');
        }

        return sendErrorToClient('Incorrect Old Password');
    }

    public function findRecord($id)
    {
        return $this->with(['shop','avatar'])->find($id);
    }
}
