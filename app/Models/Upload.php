<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Request;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use SoftDeletes;

    protected $visible = ['id', 'source', 'thumbnail', 'caption'];
    protected $fillable = ['model_name', 'ref_name', 'model_ref_id', 'source', 'thumbnail', 'caption', 'filename', 'filesize'];

    public function fileUpload($model_name, $ref_name, $file_name, $ref_id, $user_id, $caption = '')
    {
        if (Request::hasFile($file_name)) {

            $file = Request::file($file_name);
            $file_data = uploadFile($file, $user_id);
            $file_data['caption'] = $caption;

            $response = $this->storeFile($model_name, $ref_name, $ref_id, $file_data, $user_id);

            return $response;
        }
    }

    public function storeFile($model_name, $ref_name, $ref_id, $file_data, $user_id)
    {
        $conditions = ['model_name' => $model_name, 'ref_name' => $ref_name, 'model_ref_id' => $ref_id];

        if ($ref_name == 'user_gallery') {
            $conditions['source'] = $file_data['source'];
        }

        $response = $this->updateOrCreate($conditions, $file_data);

        //For Rocket Chat
        /*if (in_array($ref_name, ['profile_pic', 'company_logo'])) {
            $this->avatarRocketChat($user_id, $response->source);
        }*/

        return $response;
    }

    public function removeUploadedFiles($ref_id, $ref_name)
    {
        $files = $this->where(['model_ref_id' => $ref_id, 'ref_name' => $ref_name])->get();

        if (!empty($files)) {
            foreach ($files as $file) {
                if (Storage::disk('local')->exists($file->source)) {
                    Storage::disk('local')->delete($file->source);
                }
                if (Storage::disk('local')->exists($file->thumbnail)) {
                    Storage::disk('local')->delete($file->thumbnail);
                }
            }
        }
    }

    public function removeUploadedFile($id, $count = 0)
    {
        $file = $this->find($id);
        if ($file) {
            if ($file->delete()) {
                if (Storage::disk('local')->exists($file->source)) {
                    Storage::disk('local')->delete($file->source);
                }
                if (Storage::disk('local')->exists($file->thumbnail)) {
                    Storage::disk('local')->delete($file->thumbnail);
                }
                return $count + 1;
            }
        } else {
            return $count;
        }
    }

    public function removeFileById($id, $remove = 1)
    {
        $file = $this->find($id);

        if (!empty($file)) {
            if (Storage::disk('local')->exists($file->source)) {
                Storage::disk('local')->delete($file->source);
            }
            if (Storage::disk('local')->exists($file->thumbnail)) {
                Storage::disk('local')->delete($file->thumbnail);
            }
            if ($remove)
                $file->delete();
            return $file;
        }
    }

    public function avatarRocketChat($user_id, $file)
    {
        $this->chatLib = new RocketChatLib();

        //get auth token and user id of rc user
        $user_data = AppUser::find($user_id);
        $rc_object = json_decode($user_data->rocket_chat_object);

        if (!empty($rc_object)) {
            $headers = [
                "X-Auth-Token:" . $rc_object->authToken,
                "X-User-Id:" . $rc_object->userId,
                'Content-Type:application/json'
            ];
            $params = ['avatarUrl' => asset($file)];

            $rc_response_json = $this->chatLib->rcRequest('user-avatar', json_encode($params), $headers);
            $data = json_decode($rc_response_json);
            return $data;
        }
    }

}
