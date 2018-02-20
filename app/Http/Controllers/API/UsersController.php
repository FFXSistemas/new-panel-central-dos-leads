<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 20/02/2018
 * Time: 16:02
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function recoveryEmail(Request $request)
    {
        $request->all();
        return [
            'success' => true,
        ];

    }

}