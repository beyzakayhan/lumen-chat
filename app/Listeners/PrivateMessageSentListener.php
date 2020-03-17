<?php
namespace App\Listeners;
 
use App\Events\Event;
use App\Events\PrivateMessageSent;
use App\Events\TestEvent;
use Log;
 
class PrivateMessageSentListener
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
     * Handle the event.
     *
     * @param  TestEvent  $event
     * @return void
     */
    public function handle(PrivateMessageSent $event)
    {
      Log::info('=== TestEventListener  ========');
    }
}