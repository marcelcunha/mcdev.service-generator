<?php

namespace McDev\ServiceGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use MCDev\ServiceGenerator\Console\Commands\CrudCommand;
use MCDev\ServiceGenerator\Console\Commands\GenerateAll;
use MCDev\ServiceGenerator\Console\Commands\RepositoryCommand;
use MCDev\ServiceGenerator\Console\Commands\ServiceCommand;

class ServiceGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CrudCommand::class, GenerateAll::class, RepositoryCommand::class, ServiceCommand::class
            ]);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];
}
