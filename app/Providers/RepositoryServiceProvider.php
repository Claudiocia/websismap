<?php

namespace WebSisMap\Providers;

use Illuminate\Support\ServiceProvider;
use WebSisMap\Repositories\EmpreRepository;
use WebSisMap\Repositories\EmpreRepositoryEloquent;
use WebSisMap\Repositories\PredioRepository;
use WebSisMap\Repositories\PredioRepositoryEloquent;
use WebSisMap\Repositories\SetorRepository;
use WebSisMap\Repositories\SetorRepositoryEloquent;
use WebSisMap\Repositories\UnidadeRepository;
use WebSisMap\Repositories\UnidadeRepositoryEloquent;
use WebSisMap\Repositories\UnidTipoRepository;
use WebSisMap\Repositories\UnidTipoRepositoryEloquent;
use WebSisMap\Repositories\UserRepository;
use WebSisMap\Repositories\UserRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(EmpreRepository::class, EmpreRepositoryEloquent::class);
        $this->app->bind(PredioRepository::class, PredioRepositoryEloquent::class);
        $this->app->bind(SetorRepository::class, SetorRepositoryEloquent::class);
        $this->app->bind(UnidadeRepository::class, UnidadeRepositoryEloquent::class);
        //:end-bindings:
    }
}
