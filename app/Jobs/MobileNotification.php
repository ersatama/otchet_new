<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\Mobile;
use App\Models\Notification;

class MobileNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $notification;
    public function __construct(Notification $notification)
    {
        $this->notification =   $notification;
    }

    public function handle(Mobile $mobile)
    {
        $mobile->send($this->notification);
    }
}
