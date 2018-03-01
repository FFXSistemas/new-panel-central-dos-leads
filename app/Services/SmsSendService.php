<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 01/03/2018
 * Time: 12:49
 */

namespace App\Services;

use GuzzleHttp\Client;

class SmsSendService
{
    /**
     * SmsSendService constructor.
     */
    public function __construct()
    {
        $this->client = (new Client());
    }

    /**
     * @param $phone
     * @param $text
     * @return array
     */
    public function sendLongCode($phone, $text)
    {
        $res = $this->client->request('GET', 'http://sistema.fusiontechnology.com.br:2738/sms/send?n='.$phone.'&m='.$text.'&f=0&u='.env('SMS_USER'));
        return ['success' => ($res->getStatusCode() == 200) ? true:false ];
    }

    /**
     * @param $phone
     * @param $text
     * @return array
     */
    public function sendShortCode($phone, $text)
    {
        $res = $this->client->request('GET', 'http://sistema.fusiontechnology.com.br:2738/sms/send?n='.$phone.'&m='.$text.'&f=2&u='.env('SMS_USER'));
        return ['success' => ($res->getStatusCode() == 200) ? true:false ];
    }
}