<?php

namespace App\Providers;

use App\Http\ViewComposer\SidebarComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class PanelSidebarProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function __construct($app)
    {
        $this->sidebarProvider = new SidebarComposer();
        parent::__construct($app);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*' , function(View $view) {
            $this->sidebarProvider->compose($view);
        });
    }
}
