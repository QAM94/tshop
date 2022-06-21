<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['parent_id', 'title', 'is_active', 'is_popular'];

    public function products()
    {
        return $this->hasManyThrough(Product::class, CategoryProduct::class, 'category_id', 'upc', 'id', 'product_upc');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public static function getSubCategories()
    {
        return self::with('parent')->where('parent_id', '>', 0)
            ->where('is_active', 1)->get();
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('title', 'like', '%' . $value . '%');
    }

    public function allCategories($params)
    {
        if (isset($params['parent_id']) && $params['parent_id'] !== '') {
            $query = $this->where('parent_id', '!=', 0)->with(['children', 'parent']);
        } else {
            $query = $this->where('parent_id', 0)->with(['children', 'parent']);
        }
        if (isset($params['search']) && $params['search'] !== '') {
            $query->search($params['search']);
        }
        if (isset($params['popular']) && $params['popular'] === true) {
            $query->where('is_popular', 1);
        }
        $limit = isset($params['limit']) && $params['limit'] !== '' ? $params['limit'] : 10;
        $categories = $query->orderBy('is_popular', 'desc')->paginate($limit);
        return $categories;
    }

    public function getCategoryDetail($id)
    {
        //return $this->with(['children', 'parent','products'])->find($id);
        return $this->with(['children', 'parent'])->find($id);
    }

    public function createRecord($request)
    {
        $request->merge(['slug' => Str::slug($request->title)]);
        $category = $this->create($request->only($this->getFillable()));
        return $this->getCategoryDetail($category->id);
    }

    public function updateRecord($request)
    {
        if (!empty($request->title)) {
            $request->merge(['slug' => Str::slug($request->title)]);
        }
        $this->find($request->id)->update($request->only($this->getFillable()));
        return $this->getCategoryDetail($request->id);
    }

    public function makeIndexParams($request)
    {
        $limit = $request->has('limit') ? $request->limit : 20;
        $search = $request->has('search') ? $request->search : '';
        $is_parent = $request->has('parent_id') ? $request->parent_id : '';
        $params = ['limit' => $limit, 'search' => $search, 'parent_id' => $is_parent];
        return $this->allCategories($params);
    }

    public function deleteRecord($id)
    {
        $record = $this->find($id);
        if (empty($record)) {
            return sendErrorToClient('Invalid Record ID');
        }
        $record->delete();
        return makeClientHappy($id);
    }

    public function getRecords($category_id = 0)
    {
        if($category_id > 0)
            return $this->where('parent_id', '>', 0)->where('id', '>=', $category_id)->get();
        return $this->where('is_active', 1)->get();
    }

    public function getColumnsForDataTable()
    {
        $data = [
            ['data' => 'parent', 'name' => 'parent', 'title' => 'Parent'],
            ['data' => 'title', 'name' => 'title', 'title' => 'Name'],
            ['data' => 'is_active', 'name' => 'is_active', 'title' => 'Is Active?',
                'searchable' => 'false', 'nosort' => 'true'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'Action',
                'searchable' => 'false', 'nosort' => 'true']
        ];
        return json_encode($data);
    }

    public function orderArray()
    {
        return [
            ['name' => 'store.title', 'relationship' => ['model' => 'store', 'column_name' => 'title']],
            ['name' => 'category.title', 'relationship' => ['model' => 'category', 'column_name' => 'title']],
            ['name' => 'title'],
            ['name' => 'brand'],
            ['name' => 'price']
        ];
    }

    public function ajaxListing()
    {
        return $this::query()->with('parent');
    }

    public function findRecord($id)
    {
        return $this->with(['parent'])->find($id);
    }

}
