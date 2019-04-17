<?php

namespace App\Providers;

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
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapPupilparentRoutes();

        $this->mapVisitorRoutes();

        $this->mapStaffRoutes();

        $this->mapPupilRoutes();

        $this->mapAdminRoutes();

        //
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
            'middleware' => ['web', 'admin', 'auth:admin'],
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "pupil" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPupilRoutes()
    {
        Route::group([
            'middleware' => ['web', 'pupil', 'auth:pupil'],
            'prefix' => 'pupil',
            'as' => 'pupil.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/pupil.php');
        });
    }

    /**
     * Define the "staff" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapStaffRoutes()
    {
        Route::group([
            'middleware' => ['web', 'staff', 'auth:staff'],
            'prefix' => 'staff',
            'as' => 'staff.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/staff.php');
        });
    }

    /**
     * Define the "visitor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapVisitorRoutes()
    {
        Route::group([
            'middleware' => ['web', 'visitor', 'auth:visitor'],
            'prefix' => 'visitor',
            'as' => 'visitor.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/visitor.php');
        });
    }

    /**
     * Define the "pupilparent" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPupilparentRoutes()
    {
        Route::group([
            'middleware' => ['web', 'pupilparent', 'auth:pupilparent'],
            'prefix' => 'pupilparent',
            'as' => 'pupilparent.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/pupilparent.php');
        });
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
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
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
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
