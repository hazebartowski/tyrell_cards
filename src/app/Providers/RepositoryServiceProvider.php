<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CardContract;
use App\Repositories\CardRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CardContract::class => CardRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
