<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // it helps to unguard all the fillable properties that we have mentioned in the models
        Model::unguard();

        // Gate::define('admin', function (User $user) {
        //     return $user->username === 'aayam';
        // });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
