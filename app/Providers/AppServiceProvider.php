<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
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
        //las siguientes tres lineas fueron agregadas para el deploy
        /* si estamos en entorno de produccion, entonces ejecuta las siguientes lineas */
        if ($this->app->environment() == 'production') {
            $this->app->bind('path.public', function() {
                return base_path().'/../public_html';
            });
        }
        /*$this->app->bind('path.public', function() {
            return base_path().'/../public_html';
        });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

        // Agregar la regla de validación has_no_subscription
        Validator::extend('has_no_subscription', function ($attribute, $value, $parameters, $validator) {
            // Obtener el usuario con el email especificado
            $user = User::where('email', $value)->first();

            // Verificar si el usuario ya tiene una suscripción
            return $user ? !$user->hasSubscription() : true;
        });

    }
}
