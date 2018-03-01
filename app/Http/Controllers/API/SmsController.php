<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 01/03/2018
 * Time: 12:23
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\SmsSendService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * SmsController constructor.
     */
    public function __construct()
    {
        $this->service = (new SmsSendService());
    }

    /**
     * @param Request $request
     * @return array
     */
    public function sendLongSms(Request $request)
    {
        $args = $request->all();
        return $this->service->sendLongCode($args['number'], $args['text']);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function sendShortSms(Request $request)
    {
        $args = $request->all();
        return $this->service->sendShortCode($args['number'], $args['text']);
    }

}