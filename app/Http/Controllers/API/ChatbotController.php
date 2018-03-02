<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 28/02/2018
 * Time: 16:36
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Repositories\ChatbotRepository;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $body = file_get_contents('php://input');
        $body = json_decode($body, true);
        $store = (new ChatbotRepository())->create($body);
        return ['success' => true];
    }
}