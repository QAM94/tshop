<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use View;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $dataAssign;
    protected $layout_base = 'panel';

    protected $actions_view = 'includes.datatable_buttons';
    protected $checks_view = 'includes.datatable_check';
    protected $toggle_view = 'includes.datatable_toggle';
    protected $image_view = 'includes.datatable_image';
    protected $status_view = 'includes.datatable_status';
    protected $url_view = 'includes.datatable_url';

    protected $show_image_in_list = [];
    protected $show_status_in_list = [];
    protected $show_toggle_in_list = [];
    protected $show_url_in_list = [];
    protected $hasManualSearch = [];
    protected $hasRawCodeColumn = ['price','created_at'];
    protected $currency = 'SR';

    protected $actions = ['add', 'edit', 'delete'];

    protected $rawColumns = ['actions'];

    final function getElementViews()
    {
        //return ['image', 'toggle', 'url', 'dropdown', 'comment'];
        return ['status','image', 'url'];
    }

    final function makeDataTable($data, $actions, $module)
    {
        $buttons = empty($this->makeCustomActionButtonsForNestedTables)
            ? $this->makeCustomActionButtons($module)
            : $this->makeCustomActionButtonsForNestedTables;


        $data_table = Datatables::of($data)->order(function ($query) {
            $query->orderBy('created_at', 'desc');
        });

        if (!empty($this->rawColumns)) {
            foreach ($this->rawColumns as $rawCol) {
                $compact_arr = $rawCol == 'actions' ?
                    compact('module', 'buttons', 'actions') : compact('module');
                $view = $this->layout_base . '.' .$this->{$rawCol.'_view'};
                $data_table->addColumn($rawCol, function ($row) use ($view, $compact_arr) {
                    $compact_arr['row'] = $row;
                    return View::make($view, $compact_arr)->render();
                });
            }
        }

        foreach ($this->hasRawCodeColumn as $code_col) {
            $data_table->editColumn($code_col, function ($row) use ($code_col) {
                if ($code_col == 'parent') {
                    return !empty($row->parent) ? $row->parent->title : 'N/A';
                }
                if ($code_col == 'price') {
                    return $this->currency.$row->price;
                }
                if ($code_col == 'created_at') {
                    return !empty($row->created_at) ? date('jS M Y h:i A',
                        strtotime($row->created_at)) : 'N/A';
                }
            });
        }

        $list_elements = $this->getElementViews();
        if(!empty($list_elements)){
            foreach ($list_elements as $list_element) {
                $key = 'show_' . $list_element . '_in_list';
                $val = $list_element . '_view';
                if (!empty($this->$key)) {
                    $data = $list_element == 'dropdown' ? $this->show_drop_down_model->get() : NULL;
                    $func = in_array($list_element,['url','comment']) ? 'editColumn' : 'addColumn';
                    $this->makeDataTableColumnElement($this->$key, $data_table, $this->$val, $data, $func);
                }
            }
        }

        if (!empty($this->hasManualSearch)) {

            $model = $this->hasManualSearch['model'];

            $data_table->filter(function ($query) use ($model) {

                return $model->manualSearch($query);
            });
        }

        return $data_table->rawColumns($this->rawColumns)->make(true);

    }

    protected function makeDataTableColumnElement($show_element_in_list, $data_table, $element_view, $data, $func)
    {
        foreach ($show_element_in_list as $element_column) {

            $data_table->$func($element_column['column_name'], function ($row) use ($element_column, $element_view, $data) {

                $column = $row->{$element_column['column_data']};

                return View::make($this->layout_base . '.' . $element_view, compact('row', 'column', 'data'))->render();

            });

            $this->rawColumns[] = $element_column['column_name'];
        }

    }

    protected function makeCustomActionButtons($module)
    {
        return [
            'edit' => ['route' => $module . '.edit'],
            'delete' => ['route' => $module . '.delete'],
            'view' => ['route' => $module . '.view'],
            'recall' => ['route' => $module . '.recall'],
        ];
    }

    public function changeStatus(Request $request)
    {
        switch ($request->case) {
            case 'featured':
                $column = 'is_featured';
                break;
            case 'top':
                $column = 'is_top';
                break;
            default:
                $column = 'is_active';
        }
        $this->primary_model->whereIn('id', $request->id)
            ->update([
                $column => DB::raw('IF(' . $column . ' = 1,0,1)')
            ]);
    }
}
