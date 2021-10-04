<?php

namespace Fresh\Medpravda\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Fresh\Medpravda\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

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

        $this->mapManageRoutes();

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
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web_ua.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web_ru.php'));
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

    protected function mapManageRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manage/auth.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manage/navigation.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manage/administration.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manage/gallery.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manage/dependency.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manage/manual.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manage/media.php'));
    }
}
