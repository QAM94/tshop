<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/check-auth', config('filesystems.PANEL_CONTROLLER_PATH') . 'DashboardController@checkAuth')->name('check_auth');

Route::group(['middleware' => 'guest'], function () {

    Route::get('/', function () {
        return view('panel.auth.login');
    })->name('login');

});

Route::get('/email-temp', config('filesystems.PANEL_CONTROLLER_PATH') . 'CurrentRecallController@sendRecallEmail')->name('send-recall');

Route::get('/email-temp-html', function () {
    return view('emails.recall_temp');
})->name('email-temp');

Route::group(['middleware' => ['auth', 'role', 'logout']], function () {

    Route::get('/', config('filesystems.PANEL_CONTROLLER_PATH') . 'DashboardController@dashboard')->name('dashboard');

    Route::get('customer-information', config('filesystems.PANEL_CONTROLLER_PATH') . 'CustomersController@customerInformation')->name('customer_information');

    Route::get('user-profile', config('filesystems.PANEL_CONTROLLER_PATH') . 'UsersController@editProfile')->name('user.profile_edit');

    Route::post('update-profile/{id}', config('filesystems.PANEL_CONTROLLER_PATH') . 'UsersController@updateProfile')->name('user.profile_update');

    Route::get('search', config('filesystems.PANEL_CONTROLLER_PATH') . 'GlobalSearchController@index')->name('search');

    $crud_modules = [

        ['module_name' => 'dashboard', 'controller_name' => 'Dashboard',

            'additional_routes' => [

                [
                    'route_name' => 'shopAjaxListing',
                    'method' => 'shopAjaxListing',
                    'url' => 'shopList',
                    'http_method' => 'get'
                ],
                [
                    'route_name' => 'search',
                    'method' => 'search',
                    'url' => 'search',
                    'http_method' => 'get'
                ],
                [
                    'route_name' => 'send-recall',
                    'method' => 'sendRecall',
                    'url' => 'send-recall/{id}',
                    'http_method' => 'get'
                ]
            ]
        ],

        ['module_name' => 'roles', 'controller_name' => 'Roles'],

        ['module_name' => 'users', 'controller_name' => 'Users' ,

            'additional_routes' => [

                [
                    'route_name' => 'change-password',
                    'method' => 'changePassword',
                    'url' => 'change-password',
                    'http_method' => 'post'
                ],
                [
                    'route_name' => 'profile',
                    'method' => 'editAdminProfile',
                    'url' => 'profile',
                    'http_method' => 'get'
                ],
                [
                    'route_name' => 'update-profile',
                    'method' => 'updateAdminProfile',
                    'url' => 'update-profile/{id}',
                    'http_method' => 'post'
                ]
            ],
        ],

        ['module_name' => 'cashier', 'controller_name' => 'Agents',

            'additional_routes' => [

                [
                    'route_name' => 'search',
                    'method' => 'search',
                    'url' => 'search',
                    'http_method' => 'get'
                ],
                [
                    'route_name' => 'logout',
                    'method' => 'logout',
                    'url' => 'logout',
                    'http_method' => 'get'
                ],
            ]
        ],

        ['module_name' => 'categories', 'controller_name' => 'Categories'],
        ['module_name' => 'product_categories', 'controller_name' => 'ProductCategories'],
        ['module_name' => 'products', 'controller_name' => 'Products',
            'additional_routes' => [
                [
                    'route_name' => 'byShop',
                    'method' => 'getByShop',
                    'url' => 'by-shop/{shop_id}',
                    'http_method' => 'get'
                ],
                [
                    'route_name' => 'shopList',
                    'method' => 'showByShop',
                    'url' => 'shop/{shop_id}',
                    'http_method' => 'get'
                ],
            ]
        ],
        ['module_name' => 'receipts', 'controller_name' => 'Receipts',
            'additional_routes' => [
                [
                    'route_name' => 'detail-row',
                    'method' => 'detailRow',
                    'url' => 'detail-row/{shop_id}',
                    'http_method' => 'get'
                ],
            ]],

        ['module_name' => 'customers', 'controller_name' => 'Customers',
            'additional_routes' => [
                [
                    'route_name' => 'getinfo',
                    'method' => 'info',
                    'url' => 'get-info/{email}',
                    'http_method' => 'get'
                ],
                [
                    'route_name' => 'byShop',
                    'method' => 'getByShop',
                    'url' => 'by-shop/{shop_id}',
                    'http_method' => 'get'
                ],
                [
                    'route_name' => 'getFrom',
                    'method' => 'form',
                    'url' => 'form',
                    'http_method' => 'get'
                ],
            ]
        ],

        ['module_name' => 'shops', 'controller_name' => 'Shops'],
        ['module_name' => 'sales-purchase', 'controller_name' => 'SalesPurchase']
    ];
    makeRoute($crud_modules);

});

function makeRoute($crud_modules)
{

    foreach ($crud_modules as $module) {

        $controller = config('filesystems.PANEL_CONTROLLER_PATH') . $module['controller_name'] . 'Controller';

        Route::get($module['module_name'], $controller . '@show')->name($module['module_name'] . '.show');

        Route::get($module['module_name'] . '-add', $controller . '@add')->name($module['module_name'] . '.add');

        Route::post($module['module_name'] . '-add', $controller . '@store')->name($module['module_name'] . '.add');

        Route::get($module['module_name'] . '-edit/{id}', $controller . '@edit')->name($module['module_name'] . '.edit');

        Route::post($module['module_name'] . '-edit/{id}', $controller . '@update')->name($module['module_name'] . '.edit');

        Route::get($module['module_name'] . '-copy/{id}', $controller . '@copy')->name($module['module_name'] . '.copy');

        Route::get($module['module_name'] . '-delete/{id}', $controller . '@delete')->name($module['module_name'] . '.delete');

        Route::get($module['module_name'] . '-view/{id}', $controller . '@view')->name($module['module_name'] . '.view');

        Route::get($module['module_name'] . '-list', $controller . '@ajaxListing')->name($module['module_name'] . '.ajaxListing');

        if (!empty($module['additional_routes'])) {

            foreach ($module['additional_routes'] as $additional_route) {

                Route::match([$additional_route['http_method']],
                    $module['module_name'] . '-' . $additional_route['url'], $controller . '@' . $additional_route['method'])
                    ->name($module['module_name'] . '.' . $additional_route['route_name']);
            }
        }
    }
}
