<?php

namespace App\Http\ViewComposer;

use App\Models\SystemModule;
use Illuminate\View\View;
use Route;

class SidebarComposer
{

    /**
     * @return mixed
     */
    final function getModuleList()
    {
        return SystemModule::where(['parent_id' => 0, 'is_active' => 1])
            ->orderBy('sort')->with('children')->get()->toArray();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('modules', $this->getModuleList());
        $view->with('current_route_name', Route::currentRouteName());
        $view->with('currency', 'Rs ');
    }
}
