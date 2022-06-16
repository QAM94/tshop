<?php

use Illuminate\Support\Facades\Auth;

function checkInMultiDeminsionalArray($array, $keyToFind, $valueToFind)
{
    if (!$array) {
        return false;
    }

    foreach ($array as $value) {
        if ($value[$keyToFind] == $valueToFind) {

            return true;
        }

    }
    return false;
}

function checkIfRoleChecked($permissions, $slug, $type)
{
    $value = '';

    if (isset($permissions)) {
        foreach ($permissions as $permission) {
            if ($permission->system_module == $slug && $permission->{$type} == 1) {
                $value = 'checked';
            }
        }
    }

    return $value;
}

function hasRole($slug, $key)
{
    return Auth()->user()->hasPermission($slug, Auth()->user()->role, $key);
}

function hasRoleInChild($module_children, $key)
{

    foreach ($module_children as $child) {

        if (Auth()->user()->hasPermission($child['slug'], Auth()->user()->role, $key)) {
            return 1;
        }
    }

    return 0;

}

function setText($string, $singular = false)
{

    $string = ucwords(str_replace("url", "URL", $string));
    $string = ucwords(str_replace("_", " ", $string));
    $string = ucwords(str_replace("-", " ", $string));

    if ($singular) {
        $string = Str::singular($string);
    }

    return $string;
}

function getUserAvatar($id = false)
{
    if (!$id) {
        $id = Auth()->user()->id;
    }

    $default_img = 'assets/img/avatar1.png';

    $user_image = \App\Models\Upload::where('model_name', 'users')->where('model_ref_id', $id)->where('ref_name', 'user_image')->first();

    return asset(is_null($user_image) ? $default_img : $user_image->source);
}

function getGuestAvatar($id = false)
{
    if (!$id) {
        $id = Auth()->user()->id;
    }

    $default_img = 'assets/img/avatar.png';

    $user_image = \App\Models\Upload::where('model_name', 'guests')->where('model_ref_id', $id)->where('ref_name', 'guest_image')->first();

    return asset(is_null($user_image) ? $default_img : $user_image->source);
}

function getTaskOfUser()
{
    return \App\Models\Task::where('branch_id', Auth::user()->branch_id)
        ->Where('assign_to', Auth::user()->id)
        ->Where('is_done', 0)
        ->get();
}

function addCommaForNumeric($value)
{
    if (!is_null($value)) {
        return number_format($value);
    }
}



