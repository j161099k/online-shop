<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('admin')
                ->middleware('web', 'auth')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));
        });
/* 
        $this->setCustomResolutionLogicForModels([$this, 'resolveEncryptedIds'],
        [
            'provider' => \App\Models\Provider::class,
            'combo' => \App\Models\Combo::class,
            'product' => \App\Models\Product::class,
            'order' => \App\Models\Order::class,
            'ingredient' => \App\Models\Ingredient::class,
            'category' => \App\Models\Category::class,
        ]); */
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
    /**
     * Configure custom resolution logic for model binding in routes.
     * 
     * @param callable $resolutionLogic
     * A function to be run when resolving a model through the bound parameter.
     * @param array<string> $parametersBoundToModels 
     * An array of model names, which are to be bound to a parameter.
     * 
     * @return void
     */
    protected function setCustomResolutionLogicForModels(callable $resolutionLogic, array $parametersBoundToModels): void
    {
        foreach ($parametersBoundToModels as $parameter => $modelName) {
            Route::bind($parameter, fn ($value) => $resolutionLogic($value, $modelName));
        }
    }

    protected function resolveEncryptedIds($encryptedId, $modelName): \Illuminate\Database\Eloquent\Model
    {
        $id = \Illuminate\Support\Facades\Crypt::decrypt($encryptedId);
        return $modelName::findOrFail($id);
    }
}
