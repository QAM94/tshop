<?php

function filterPostRequest($req_data, $table)
{
    $columns = \Schema::getColumnListing($table);

    foreach ($req_data as $key => $value1) {
        if (!in_array($key, $columns)) {
            unset($req_data[$key]);
        }
    }
    return $req_data;
}

function sendExpToClient($ex)
{
    $response = [];
    $response['message'] = $ex->getMessage();
    return response($response, 400);
}

function sendErrorToClient($error)
{
    $response = [];
    $response['message'] = $error;
    return response($response, 400);
}

function makeClientHappy($data = [], $msg = 'success')
{
    $response = [];
    $response['message'] = $msg;
    $response['data'] = $data;

    return response($response, 200);
}

function makeClientHappyWithPagination($data, $msg = 'success')
{
    $data = $data->toArray();
    $response = [];
    $response['message'] = $msg;

    $response['data'] = $data['data'];
    unset($data['data']);
    $response['page'] = $data;
    return response($response, 200);
}

function uploadFile($file, $user_id = null, $encrypt = false, $id = null)
{
    $src = "";
    $thumbnail = "";
    $file_size = "";
    $basename = str_slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
    $ext = $file->getClientOriginalExtension();
    $prefix = !empty($id) ? $id : time();

    if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'bmp', 'pdf', 'doc', 'docx', 'mp4'])) {
        $file_size_kb = $file->getSize() / 1024;
        $file_size = ($file_size_kb > 1024 ? (round($file_size_kb / 1024, 2)) . ' MB' : (round($file_size_kb, 2)) . ' KB');
        $file_name = ($encrypt == true ? md5($prefix) : $prefix . $basename) . '.' . $ext;
        $file_path = 'uploads/' . $user_id;

        //Create Directory Monthly
        Storage::makeDirectory($file_path);

        if (Storage::putFileAs($file_path, $file, $file_name)) {

            $src = $file_path . '/' . $file_name;
            //Create Thumbnail
            if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'bmp'])) {
                $thumbnail = createThumbnail($file, $user_id ,$file_name);
            }
        }
    }

    return ['source' => $src, 'thumbnail' => $thumbnail, 'filename' => $file->getClientOriginalName(), 'filesize' => $file_size];
}

function createThumbnail($file, $user_id, $file_name)
{
    $img = Image::make($file);
    $img->resize(null, 200, function ($constraint) {
        $constraint->aspectRatio();
    });
    $resource = $img->stream()->detach();

    //Save Thumbnail
    $file_path = 'uploads/' . $user_id . '/thumbnail/';
    $thumbnail = $file_path . $file_name;
    //Storage::disk('s3')->put($thumbnail, $resource);
    Storage::put($thumbnail, $resource);

    return $thumbnail;
}

function uploadCustomFile($file)
{
    $basename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
    $ext = $file->getClientOriginalExtension();
    $name = time() . $basename . "." . $ext;
    $file->move(public_path() . '/files/', $name);
    $src = '/files/' . $name;
    return ['source' => $src, 'thumbnail' => '', 'filename' => $file->getClientOriginalName(), 'filesize' => ''];
}

function sendEmail($email_data)
{
    $template = 'emails.' . $email_data['temp'];
    \Illuminate\Support\Facades\Mail::send($template, $email_data['data'], function ($message) use ($email_data) {
        $message->to($email_data['to'])->subject($email_data['subject']);
    });

    if (\Illuminate\Support\Facades\Mail::failures())
        return false;
    return true;
}

function getWebPage($url, $post_data = '')
{
    try { //Send CURL Request to API

        $headers = array();
        $headers[] = 'Content-Type: application/json';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if(!empty($post_data)) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Send the request
        $response = curl_exec($ch);

        //Close request
        if ($response === FALSE) {
            die('Error: ' . curl_error($ch));
        }

        curl_close($ch);
        return $response;

    } catch (\Exception $e) {
        //handle exception
        throw new \Exception($e->getMessage());
    }

}

function dbinput($string) {
    $product_type = str_replace(' ,', ', ', str_replace('  ', ' ', str_replace('<br/>', ',', $string)));
    return htmlspecialchars_decode($product_type);
}

