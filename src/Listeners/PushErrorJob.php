<?php

namespace Brunomluiz\ErrorLogSlack\Listeners;

use Brunomluiz\ErrorLogSlack\Jobs\Slack;
use \Log;

/**
 * Class PushErrorJob
 * @package Brunomluiz\ErrorLogSlack\Listeners
 */
class PushErrorJob
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param $level
     * @param $message
     * @param $data
     */
    public function handle($level, $message, $data)
    {
        if  ($level == "error") {
            dispatch((new Slack(
                $level,
                $message,
                $data
            ))->onQueue("errors"));
        }
    }
}
