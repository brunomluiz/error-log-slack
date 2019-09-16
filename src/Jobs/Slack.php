<?php

namespace Brunomluiz\ErrorLogSlack\Jobs;

use \App\Jobs\Job;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class Slack
 * @package Brunomluiz\ErrorLogSlack\Jobs
 */
class Slack extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var
     */
    protected $level;
    /**
     * @var
     */
    protected $message;
    /**
     * @var
     */
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($level, $message, $data)
    {
        $this->level = $level;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            return (new Client())->request("POST", env("SLACK_HTTP_POST"), [
                'headers' => [
                    'Content-type' => 'application/json',
                ],
                'json' => [
                    'text' => $this->message,
                ]
            ]);
        } catch (ClientException $e){
            //
        }
    }
}
