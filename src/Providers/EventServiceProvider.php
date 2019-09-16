<?php

namespace Brunomluiz\ErrorLogSlack\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Brunomluiz\ErrorLogSlack\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [
        'illuminate.log' => [
            'Brunomluiz\ErrorLogSlack\Listeners\PushErrorJob',
        ],
    ];

    /**
     * @param DispatcherContract $events
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
    }
}
