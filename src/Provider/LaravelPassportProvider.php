<?php

namespace Gitmagox\Identifier\Providers;
use Illuminate\Support\ServiceProvider;

class LaravelPassportProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [

    ];
    /**
     * {@inheritdoc}
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * Alias the middleware.
     *
     * @return void
     */
    protected function aliasMiddleware()
    {

    }
}
