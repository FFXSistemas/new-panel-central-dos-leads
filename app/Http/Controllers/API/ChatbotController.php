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
     */
    public function store(Request $request)
    {
        $json = get_object_vars(json_decode($request->chatbot));
        $store = (new ChatbotRepository())->create($json);
        var_dump($store);
    }
}