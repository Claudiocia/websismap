<?php

namespace WebSisMap\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use WebSisMap\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'WebSisMap\Model' => 'WebSisMap\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('admin', function ($user){
            return $user->role == User::ROLE_ADMIN;
        });

        \Gate::define('operador', function ($user){
            return $user->role == User::ROLE_OPERADOR;
        });

        \Gate::define('cliente', function ($user){
            return $user->role == User::ROLE_CLIENTE;
        });

    }
}
