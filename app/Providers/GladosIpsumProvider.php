<?php

namespace P3\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class GladosIpsumProvider extends ServiceProvider
{
  public function boot()
  {
  }

  public function register()
  {
    $this->app['robots'] = $this->app->share(function($app)
    {
        return new AppRobots();
    });
  }
}