<?php


namespace App\Notifications;


use App\Domain\Contracts\MainContract;
use App\Helpers\Curl\Curl;

class Mobile
{

    protected $token    =   'AAAAf6w4Mlk:APA91bFHd29hmG6a21Dj7wtLTfwSwvCTWjpBrBgKJT35PF9oV-Z4gWEXrh1trQpOTExGklFHQcU5kGYffcpL1_knJY-n8-6RRMCbnCpjoE486m_rvJ5iqcepK966Q1Sh_7a8XQGqIC-e';
    protected $url      =   'https://fcm.googleapis.com/fcm/send';
    protected $curl;

    public function __construct(Curl $curl)
    {
        $this->curl =   $curl;
    }

    public function send($notification)
    {
        $data   =   [
            MainContract::TITLE =>  $notification->{MainContract::TITLE},
            MainContract::BODY  =>  $notification->{MainContract::DESCRIPTION}
        ];
        $this->android($data);
        $this->ios($data);
    }

    public function android($data)
    {
        $this->curl->post($this->url,$this->token,[
            MainContract::TO    =>  '/topics/android',
            MainContract::DATA  =>  $data
        ]);
    }

    public function ios($data)
    {
        $this->curl->post($this->url,$this->token,[
            MainContract::TO    =>  '/topics/ios',
            MainContract::DATA  =>  $data
        ]);
    }
}
