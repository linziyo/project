<?php

namespace App\Providers;

use App\Models\Tenant;
use HipsterJazzbo\Landlord\Facades\Landlord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Request $request)
    {
        $tenant = Tenant::current($request);
        if (!empty($tenant)) {
            Landlord::addTenant($tenant);
        }

        $this->mapAdminRoutes();

        $this->mapTenantRoutes();

        $this->mapDoctorRoutes();

        $this->mapPadRoutes();

        $this->mapDataRoutes();

        $this->mapWechatRoutes();

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'prefix' => 'admin',
            'namespace' => $this->namespace . '\Admin',
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapTenantRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'prefix' => 'tenant',
            'namespace' => $this->namespace . '\Tenant',
        ], function ($router) {
            require base_path('routes/tenant.php');
        });
    }

    /**
     * Define the "wechat" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapDoctorRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'prefix' => 'dr',
            'namespace' => $this->namespace . '\Doctor',
        ], function ($router) {
            require base_path('routes/doctor.php');
        });
    }

    /**
     * Define the "wechat" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWechatRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'prefix' => 'weixin',
            'namespace' => $this->namespace . '\Wechat',
        ], function ($router) {
            require base_path('routes/wechat.php');
        });
    }

    /**
     * Define the "pad" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPadRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'prefix' => 'pad',
            'namespace' => $this->namespace . '\Pad',
        ], function ($router) {
            require base_path('routes/pad.php');
        });
    }

    /**
     * Define the "data" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapDataRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'prefix' => 'data',
            'namespace' => $this->namespace . '\Data',
        ], function ($router) {
            require base_path('routes/data.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'prefix' => 'api',
            'namespace' => $this->namespace . '\Api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
