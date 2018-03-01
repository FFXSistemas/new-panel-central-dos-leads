<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 01/03/2018
 * Time: 12:23
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\SmsRepository;
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
        $store = (new SmsRepository())->store([
            'user_id' => $args['user_id'],
            'employer_id' => $args['employer_id'],
            'number' => $args['number'],
            'message' => $args['text'],
            'route' => 0
        ]);
        return $this->service->sendLongCode($args['number'], $args['text']);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function sendShortSms(Request $request)
    {
        $args = $request->all();
        $store = (new SmsRepository())->store([
            'user_id' => $args['user_id'],
            'employer_id' => $args['employer_id'],
            'number' => $args['number'],
            'message' => $args['text'],
            'route' => 2
        ]);
        return $this->service->sendShortCode($args['number'], $args['text']);
    }

}