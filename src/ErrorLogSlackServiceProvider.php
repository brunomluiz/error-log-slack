<?php

namespace Brunomluiz\ErrorLogSlack;

use Illuminate\Support\ServiceProvider;

/**
 * Class ErrorLogSlackServiceProvider
 * @package Brunomluiz\ErrorLogSlack
 */
class ErrorLogSlackServiceProvider extends ServiceProvider
{

    /**
     *
     */
    public function boot()
    {
        $this->app->register('Brunomluiz\ErrorLogSlack\Providers\EventServiceProvider');
    }


    /**
     *
     */
    public function register()
    {
        //
    }
}